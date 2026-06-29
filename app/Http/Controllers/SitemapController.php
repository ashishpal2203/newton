<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\StudyClass;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap with page, image, and video metadata.
     */
    public function index(): Response
    {
        $siteUrl = url('/');
        $urls = [];

        // 1. Static Core Pages
        $urls[] = [
            'loc' => $siteUrl . '/',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'daily',
            'priority' => '1.0',
            'images' => [
                [
                    'loc' => asset('assets/images/logo.png'),
                    'title' => "Newton's Academy Logo"
                ],
                [
                    'loc' => asset('assets/images/counting.png'),
                    'title' => "Student Success Statistics"
                ]
            ]
        ];

        $urls[] = [
            'loc' => $siteUrl . '/about-us',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority' => '0.8',
            'images' => [
                [
                    'loc' => asset('assets/images/about-us-header.jpeg'),
                    'title' => "About Newton's Academy classroom study"
                ]
            ]
        ];

        $urls[] = [
            'loc' => $siteUrl . '/courses',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority' => '0.9'
        ];

        $urls[] = [
            'loc' => $siteUrl . '/gallery',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority' => '0.7'
        ];

        $urls[] = [
            'loc' => $siteUrl . '/blog',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'daily',
            'priority' => '0.8'
        ];

        $urls[] = [
            'loc' => $siteUrl . '/study-material',
            'lastmod' => date('Y-m-d'),
            'changefreq' => 'weekly',
            'priority' => '0.7'
        ];

        // 2. Static Course Pages mapped in routes
        $staticCourses = [
            'jee-classes-in-mulund' => 'JEE Mains & Advanced Coaching',
            'neet-classes-in-mulund' => 'NEET Coaching Classes',
            'mht-cet-classes-in-mulund' => 'MHT-CET Coaching Classes',
            'science-classes-in-mulund' => 'XI & XII Science Board Coaching',
            'foundation-classes-in-mulund' => 'Foundation Course for 8th, 9th, 10th',
            'school-section-classes-in-mulund' => 'School Section CBSE ICSE SSC Tuitions'
        ];

        foreach ($staticCourses as $slug => $title) {
            $urls[] = [
                'loc' => $siteUrl . '/' . $slug,
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.9',
                'images' => [
                    [
                        'loc' => asset('assets/images/program.png'),
                        'title' => $title . " Program Banner"
                    ]
                ]
            ];
        }

        // 3. Dynamic CMS Courses
        $courses = Course::all();
        foreach ($courses as $course) {
            $courseImages = [];
            if ($course->banner) {
                $courseImages[] = [
                    'loc' => asset('storage/' . $course->banner),
                    'title' => $course->title
                ];
            }
            $urls[] = [
                'loc' => $siteUrl . '/courses/' . $course->slug,
                'lastmod' => $course->updated_at->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.8',
                'images' => $courseImages
            ];
        }

        // 4. Dynamic Blog Posts
        $blogs = Blog::where('status', true)->latest('published_at')->get();
        foreach ($blogs as $blog) {
            $blogImages = [];
            if ($blog->image) {
                $blogImages[] = [
                    'loc' => Storage::url($blog->image),
                    'title' => $blog->title
                ];
            }
            $urls[] = [
                'loc' => route('blog.show', $blog->slug),
                'lastmod' => $blog->updated_at->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.6',
                'images' => $blogImages
            ];
        }

        // 5. Dynamic Study Materials Classes
        $studyClasses = StudyClass::where('status', true)->get();
        foreach ($studyClasses as $class) {
            $classImages = [];
            if ($class->icon) {
                $classImages[] = [
                    'loc' => Storage::url($class->icon),
                    'title' => $class->name . " Study Materials"
                ];
            }
            $urls[] = [
                'loc' => route('study-material.years', ['class' => $class->slug]),
                'lastmod' => $class->updated_at->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority' => '0.6',
                'images' => $classImages
            ];
        }

        // Generate XML Content
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($urls as $url) {
            $xml .= '    <url>' . "\n";
            $xml .= '        <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '        <lastmod>' . $url['lastmod'] . '</lastmod>' . "\n";
            $xml .= '        <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '        <priority>' . $url['priority'] . '</priority>' . "\n";
            
            if (!empty($url['images'])) {
                foreach ($url['images'] as $image) {
                    $xml .= '        <image:image>' . "\n";
                    $xml .= '            <image:loc>' . htmlspecialchars($image['loc']) . '</image:loc>' . "\n";
                    $xml .= '            <image:title>' . htmlspecialchars($image['title']) . '</image:title>' . "\n";
                    $xml .= '        </image:image>' . "\n";
                }
            }
            
            $xml .= '    </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
            'Cache-Control' => 'public, max-age=3600'
        ]);
    }
}

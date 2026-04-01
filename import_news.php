<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\News;
use Illuminate\Support\Str;

$urls = [
    'https://informatika.unpad.ac.id/pembangunan-sarana-prasarana-di-departemen-ilmu-komputer-tahun-2023/',
    'https://informatika.unpad.ac.id/pembelajaran-aksara-sunda-inovatif-dan-menyenangkan-dengan-teknologi-augmented-reality/',
    'https://informatika.unpad.ac.id/pengabdian-pada-masyarakat-arkada/',
    'https://informatika.unpad.ac.id/apa-itu-serious-game-vr-ar-please-come-to-our-lab-raid/',
    'https://informatika.unpad.ac.id/uji-coba-permainan-pendidikan-berbasis-virtual-reality/',
    'https://informatika.unpad.ac.id/wawancana-kompas-dengan-departemen-ilmu-komputer/',
    'https://informatika.unpad.ac.id/kerjasama-dan-hilirisasi-riset-virtual-reality-antara-unpad-dan-omnivr/',
    'https://informatika.unpad.ac.id/alat-laboratorium-komputer-2020/',
    'https://informatika.unpad.ac.id/koran-pr-memberitakan-informatika-unpad/',
    'https://informatika.unpad.ac.id/kontribusi-teknik-informatika-dalam-isd-2019/'
];

foreach ($urls as $url) {
    try {
        echo "Processing: $url\n";
        $html = @file_get_contents($url);
        if (!$html) {
            echo "Failed to load URL: $url\n";
            continue;
        }

        // Parse Title
        preg_match('/<title>(.*?)<\/title>/is', $html, $matches);
        $title = isset($matches[1]) ? html_entity_decode($matches[1], ENT_QUOTES | ENT_XML1, 'UTF-8') : 'Berita Lab HCI';
        $title = str_replace([' &#8211; Informatika', ' – Informatika', ' - Informatika'], '', $title);

        // Parse DOM
        $dom = new DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'), LIBXML_NOERROR | LIBXML_NOWARNING);
        $xpath = new DOMXPath($dom);

        // Parse Content
        $contentNodes = $xpath->query("//div[contains(@class, 'entry-content')]");
        $content = '';
        if ($contentNodes->length > 0) {
            foreach ($contentNodes->item(0)->childNodes as $child) {
                // Ignore empty text nodes
                if ($child instanceof DOMText && trim($child->nodeValue) === '') {
                    continue;
                }
                // Exclude share buttons / tags metadata from wordpress
                if ($child instanceof DOMElement) {
                    $class = $child->getAttribute('class');
                    if (str_contains($class, 'sharedaddy') || str_contains($class, 'jp-relatedposts')) {
                        continue;
                    }
                }
                $content .= $dom->saveHTML($child);
            }
        } else {
            // grab paragraphs as fallback
            $pNodes = $xpath->query("//p");
            foreach ($pNodes as $p) {
                $txt = $p->nodeValue;
                if (!str_contains(strtolower($txt), 'copyright') && !str_contains(strtolower($txt), 'informatika unpad')) {
                    $content .= $dom->saveHTML($p);
                }
            }
        }
        
        $content = trim($content);
        if (empty($content)) {
            $content = "<p>Detail informasi tidak dapat dimuat, harap kunjungi link aslinya di: <a href=\"$url\">$url</a>.</p>";
        }

        // Excerpt
        $excerpt = Str::limit(strip_tags($content), 150);

        // Parse Date (if available in body class or time tag)
        $dateNodes = $xpath->query("//time[contains(@class, 'published')]");
        $published_at = now();
        if ($dateNodes->length > 0) {
            $datetimeAttr = $dateNodes->item(0)->getAttribute('datetime');
            if ($datetimeAttr) {
                $published_at = \Carbon\Carbon::parse($datetimeAttr);
            }
        }

        // Parse Image
        $featured_image = 'assets/img/hero/hero-bg.jpg';
        $metaImageNodes = $xpath->query("//meta[@property='og:image']");
        if ($metaImageNodes->length > 0) {
            $imageUrl = $metaImageNodes->item(0)->getAttribute('content');
            if (!empty($imageUrl)) {
                $imageName = time() . '_' . basename(parse_url($imageUrl, PHP_URL_PATH));
                $newsDir = public_path('assets/img/news');
                if (!is_dir($newsDir)) {
                    mkdir($newsDir, 0777, true);
                }
                $imagePath = $newsDir . '/' . $imageName;
                $imgData = @file_get_contents($imageUrl);
                if ($imgData) {
                    file_put_contents($imagePath, $imgData);
                    $featured_image = 'assets/img/news/' . $imageName;
                }
            }
        }
		
		// Create News record
		// Make sure it doesn't already exist to prevent dupes
        $slug = Str::slug($title);
        $exists = News::where('slug', $slug)->first();
        if (!$exists) {
            $news = new News();
            $news->title = $title;
            $news->slug = $slug;
            $news->excerpt = $excerpt;
            $news->content = $content;
            $news->featured_image = $featured_image;
            $news->status = 'published';
            $news->published_at = $published_at;
            $news->save();
            echo "SUCCESS: Saved '$title'\n\n";
        } else {
            echo "SKIPPED: '$title' already exists\n\n";
        }

    } catch (\Exception $e) {
        echo "ERROR: Could not process $url - " . $e->getMessage() . "\n\n";
    }
}
echo "Scraping Finished.\n";

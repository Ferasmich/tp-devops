<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class index_test extends TestCase
{
    public function testHeaderInclusion()
    {
        // Simulate the request and capture the output
        ob_start();
        require __DIR__ . '/../pages/Global/index.php';
        $output = ob_get_clean();

        // Assert that the header.php file is included
        $this->assertStringContainsString('', $output);
    }

    public function testTitleStyle()
    {
        // Simulate the request and capture the output
        ob_start();
        require __DIR__ . '/../pages/Global/index.php';
        $output = ob_get_clean();

        // Assert that the styleTitreNiveau1 function is called with the correct arguments
        $expected = 'styleTitreNiveau1("Ils ont besoin de vous!", ' . COLOR_ASSO . ')';
        $this->assertStringContainsString($expected, $output);
    }

    public function testCarouselIndicators()
    {
        // Simulate the request and capture the output
        ob_start();
        require __DIR__ . '/../pages/Global/index.php';
        $output = ob_get_clean();

        // Assert that the carousel indicators are present
        $this->assertStringContainsString('<div class="carousel-indicators">', $output);

        // Assert that there are two indicator buttons
        $this->assertMatchesRegularExpression('/<button type="button".+?data-bs-slide-to="(\d)"\s+.+?active.+?>/', $output, $matches);
        $this->assertEquals(2, count($matches));
    }

    // You can add similar test cases for other elements on the page, such as:
    // - Image presence and alt text
    // - Content of description paragraphs
    // - Link href attribute for "Visiter ma page" button (modify assertion based on actual URL)
    // - Footer inclusion
}

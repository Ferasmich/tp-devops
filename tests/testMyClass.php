<?php
// File: /var/www/html/tests/testMyClass.php

use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase {
    public function testAddition() {
        $result = 2 + 3;
        $this->assertEquals(5, $result);
    }

    // Add more test methods here...
}

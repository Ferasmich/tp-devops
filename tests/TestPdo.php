<?php
// TestPdo.php

require __DIR__ . '/../pages/Global/pdo.php'; // Include your original pdo.php file

use PHPUnit\Framework\TestCase;

class TestPdo extends TestCase
{
    public function testConnexionPDO()
    {
        // Replace these with your actual database credentials
        $host = 'your_host';
        $dbname = 'your_database_name';
        $user = 'your_username';
        $password = 'your_password';

        // Call the function to establish the PDO connection
        $pdo = connexionPDO();

        // Check if the returned value is an instance of PDO
        $this->assertInstanceOf(PDO::class, $pdo);

        // Verify that the connection parameters match
        $this->assertEquals($host, $pdo->getAttribute(PDO::ATTR_SERVER_INFO));
        $this->assertEquals($dbname, $pdo->query('SELECT DATABASE()')->fetchColumn());
        $this->assertEquals($user, $pdo->query('SELECT USER()')->fetchColumn());

        // Test error handling
        try {
            // Trigger an exception by providing incorrect credentials
            $invalidPdo = new PDO("mysql:host=$host;dbname=nonexistent_db;charset=utf8", 'invalid_user', 'invalid_password');
            $invalidPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->fail('Expected PDOException was not thrown.');
        } catch (PDOException $e) {
            // Ensure that the exception message contains the expected error message
            $this->assertStringContainsString('Erreur PDO avec le message', $e->getMessage());
        }
    }
}

<?php

namespace Test;
use PHPUnit\Framework\TestCase;

class PathTest extends TestCase
{
    public function testIndex()
    {
        $this->assertDirectoryExists(_DIR.'/public');
        $this->assertFileExists(_DIR.'/public/index.php');
        $this->assertFileIsReadable(_DIR.'/public/index.php');
        $this->assertFileIsWritable(_DIR.'/public/index.php');
    }

    public function testConfig()
    {
        $this->assertDirectoryExists(_DIR.'/app');
        $this->assertFileExists(_DIR.'/app/config.php');
        $this->assertFileExists(_DIR.'/app/config.php.example');
    }

    public function testTemplates()
    {
        $this->assertDirectoryExists(_DIR.'/templates');
        foreach (_TWIG as $value) {
            if (is_file(_DIR.'/templates/'.$value) || !file_exists(_DIR.'/templates/'.$value)) {
                $this->assertRegExp('/.twig$/', _DIR.'/templates/'.$value);
                $this->assertFileExists(_DIR.'/templates/'.$value);
            }
        }
        $this->assertFileExists(_DIR.'/templates/base.html.twig');
        $this->assertFileIsReadable(_DIR.'/templates/base.html.twig');
        $this->assertFileIsWritable(_DIR.'/templates/base.html.twig');
    }
}
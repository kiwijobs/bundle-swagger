<?php

namespace Absolvent\swagger\Benchmarks;

use Athletic\AthleticEvent;
use Symfony\Component\Yaml\Yaml;

final class YamlParsingBenchmark extends AthleticEvent
{
    /** @var string */
    private $swaggerFile;

    public function __construct()
    {
        $this->swaggerFile = 'fixtures/petstore-expanded.yml';
    }

    /**
     * @iterations 1000
     */
    public function yamlExtensionParsing()
    {
        yaml_parse_file($this->swaggerFile);
    }


    /**
     * @iterations 1000
     */
    public function symfonyYmlParsing()
    {
        Yaml::parse(file_get_contents($this->swaggerFile));
    }
}

<?php declare(strict_types=1);


use AlexaCRM\CRMToolkit\Client;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * Client test.
 */
class ClientTest extends TestCase
{

    /**
     * Parse time from xml test.
     */
    #[DataProvider('parseTimeProvider')]
    public function testParseTime(string $value, string $format, int $timestamp): void
    {
        $this->assertSame($timestamp, Client::parseTime($value, $format));
    }

    /**
     * Data provider for testParseTime.
     *
     * @return Generator
     */
    public static function parseTimeProvider(): Generator
    {
        yield [
            'value' => '2019-01-01T00:00:00Z',
            'format' => 'Y-m-d\TH:i:s\Z',
            'timestamp' => 1546300800,
        ];

        yield [
            'value' => '2025-02-14T10:41:16Z',
            'format' => 'Y-m-d\TH:i:s\Z',
            'timestamp' => 1739529676,
        ];

        yield [
            '2019-01-01T00:00:00',
            'Y-m-d\TH:i:s',
            1546300800,
        ];
    }
}

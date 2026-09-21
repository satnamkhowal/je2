<?php
$jeBusiness = require dirname(__DIR__) . '/config/business.php';
function je_business_text(string $key): string
{
    global $jeBusiness;
    return htmlspecialchars((string)($jeBusiness[$key] ?? ''), ENT_QUOTES, 'UTF-8');
}
function je_business_schema(): array
{
    global $jeBusiness;
    $area = [['@type' => 'City', 'name' => 'Jaipur'], ['@type' => 'State', 'name' => 'Rajasthan']];
    return [
        '@context' => 'https://schema.org',
        '@type' => ['EducationalOrganization', 'LocalBusiness'],
        '@id' => $jeBusiness['website'] . '#organization',
        'name' => $jeBusiness['name'], 'url' => $jeBusiness['website'],
        'telephone' => $jeBusiness['phone'], 'email' => $jeBusiness['email'],
        'description' => $jeBusiness['description'], 'hasMap' => $jeBusiness['maps'],
        'address' => ['@type' => 'PostalAddress', 'streetAddress' => $jeBusiness['street'],
            'addressLocality' => 'Jaipur', 'addressRegion' => 'Rajasthan',
            'postalCode' => '302020', 'addressCountry' => 'IN'],
        'areaServed' => $area,
        'hasOfferCatalog' => ['@type' => 'OfferCatalog', 'name' => 'Training and education guidance',
            'itemListElement' => array_map(static function ($name) use ($area, $jeBusiness) {
                return ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service',
                    'name' => $name, 'areaServed' => $area,
                    'provider' => ['@id' => $jeBusiness['website'] . '#organization']]];
            }, $jeBusiness['services'])],
    ];
}

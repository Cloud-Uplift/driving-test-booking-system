<?php
// Initialize cURL session for fetching the login page (to get CSRF token)
$login_url = 'https://en.wikipedia.org/wiki/Gislebertus';
$ch = curl_init();

// Set the URL for the GET request (fetch the login page)
curl_setopt($ch, CURLOPT_URL, $login_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HEADER, true); // Include headers in the output
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies.txt');  // Save cookies to cookies.txt
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies.txt'); // Use saved cookies

// Set User-Agent to mimic a real browser
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36');

// Specify the path to the cacert.pem file
curl_setopt($ch, CURLOPT_CAINFO, '/path/to/cacert.pem');

// Execute GET request and get the login page HTML
$login_page = curl_exec($ch);

// Check HTTP status code
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo "HTTP Status Code: $http_code\n";

// Check the final URL (to see if it's being redirected)
$effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
echo "Final URL: $effective_url\n";

// Output the response (headers + body)
echo $login_page;

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

// Close the cURL session
curl_close($ch);
?>

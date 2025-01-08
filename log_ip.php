<?php
// Get the raw POST data
$rawData = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($rawData, true);

// Check if the IP address is set
if (isset($data['ip'])) {
    $ip = $data['ip'];

    // Log the IP address to a file
    $logFile = 'ip_log.txt';
    $currentDate = date('Y-m-d H:i:s');
    $logEntry = "$currentDate - IP: $ip\n";

    // Append the log entry to the file
    file_put_contents($logFile, $logEntry, FILE_APPEND);

    // Send a response back to the client
    echo json_encode(['status' => 'success', 'message' => 'IP logged successfully']);
} else {
    // Send an error response if the IP address is not set
    echo json_encode(['status' => 'error', 'message' => 'IP address not provided']);
}
?>
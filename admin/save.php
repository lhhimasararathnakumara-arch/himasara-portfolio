<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    die(json_encode(['status' => 'error', 'message' => 'Unauthorized']));
}

$dataFile = '../data.json';
$data = [];
if (file_exists($dataFile)) {
    $data = json_decode(file_get_contents($dataFile), true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Update Hero
    if(isset($_POST['hero_name'])) $data['hero']['name'] = $_POST['hero_name'];
    if(isset($_POST['hero_greeting'])) $data['hero']['greeting'] = $_POST['hero_greeting'];
    if(isset($_POST['hero_intro'])) $data['hero']['intro'] = $_POST['hero_intro'];
    if(isset($_POST['hero_taglines'])) {
        $tags = array_map('trim', explode(',', $_POST['hero_taglines']));
        $data['hero']['taglines'] = $tags;
    }

    // Update About
    if(isset($_POST['about_text1'])) $data['about']['text1'] = $_POST['about_text1'];
    if(isset($_POST['about_career_goal'])) $data['about']['career_goal'] = $_POST['about_career_goal'];
    if(isset($_POST['experience_years'])) $data['about']['experience_years'] = $_POST['experience_years'];
    if(isset($_POST['projects_completed'])) $data['about']['projects_completed'] = $_POST['projects_completed'];

    // Update Contact
    if(isset($_POST['contact_email'])) $data['contact']['email'] = $_POST['contact_email'];
    if(isset($_POST['contact_phone'])) $data['contact']['phone'] = $_POST['contact_phone'];
    if(isset($_POST['contact_whatsapp'])) $data['contact']['whatsapp'] = $_POST['contact_whatsapp'];
    if(isset($_POST['contact_linkedin'])) $data['contact']['linkedin'] = $_POST['contact_linkedin'];
    if(isset($_POST['contact_github'])) $data['contact']['github'] = $_POST['contact_github'];

    // Save
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
    
    echo json_encode(['status' => 'success']);
    exit;
}

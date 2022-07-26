<?php
 
global $conn;
 
// Connect to database
function connect(){
    global $conn;
    $conn = mysqli_connect('127.0.0.1', 'websecurity', 'websecurity', 'accounts') or die ('{error:"bad_request"}');
}
 
// Close
function disconnect(){
    global $conn;
    if ($conn){
        mysqli_close($conn);
    }
}
 
// Get sum of record
function count_records()
{
    global $conn;
    $query = mysqli_query($conn, 'select count(*) as total from users');
    if ($query){
        $row = mysqli_fetch_assoc($query);
        return $row['total'];
    }
    return 0;
}
 
// Get record by number of page
function get_all_record($limit, $start)
{
    global $conn;
    $sql = "select * from users limit {$limit}, {$start}";
    $query = mysqli_query($conn, $sql);
 
    $result = array();
 
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
    }
 
    return $result;
}
function addPerson($fname, $lname, $email){
    $data = [
        'id' => 1,
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        ]; 
    $conn = getConnetionComps();
    $sql = "INSERT INTO peoplesDetails (id, fname, lname, email) VALUES (:id, :fname, :lname, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function getid($email)
{
    $data = [
        'email' => $email,
        ];
    $conn = getConnetionComps();
    $sql = "SELECT id FROM peoplesDetails WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $data = $stmt->execute($data);
    while($rowObj = $data->fetchObject()){
        $id = $rowObj->id;
    }
    return $id;
}
                

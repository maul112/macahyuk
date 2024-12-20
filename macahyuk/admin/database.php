<?php 
// include_once("config.php"); 

define("DB", mysqli_connect('sql112.infinityfree.com', 'if0_37823817', 'd945E1ddb0', 'if0_37823817_perpus'));

function getPopulerBooks(){
  $sql = "SELECT * FROM books where is_trending=1 limit 12";
  $query = DB->query($sql);
  $res = [];
  if ($query->num_rows>0){
    while ($row = $query->fetch_assoc() ) {
      $res[]=$row;
    }
  }
  return $res;
}

function getBookByID($ID){
  $stmt = DB->prepare("SELECT * FROM books where id=?");
  $stmt->bind_param("i",$ID);
  $stmt->execute();
  $res = $stmt->get_result();
  if ($res->num_rows>0){
    return $res->fetch_assoc();
  }
  else {
    return false;
  }
}

function getBookCatByID($ID){
  $stmt = DB->prepare("SELECT categories.name FROM bookcategory,categories WHERE bookcategory.category_id=categories.id and bookcategory.book_id=?");
  $stmt->bind_param("i",$ID);
  $stmt->execute();
  $res = $stmt->get_result();

  if ($res->num_rows>0){
    $cat = [];
    while ($row = $res->fetch_assoc()) {
      $cat[]=$row;
    }
    return array_column($cat, 'name');
  }else {
    return false;
  }
}

// --- 
function getDataUserByID($ID){
  $stmt = DB->prepare("SELECT * FROM users where id=?");
  $stmt->bind_param("i",$ID);
  $stmt->execute();
  $res = $stmt->get_result();
  return $res->fetch_assoc();
}

function getDataBankByUserID($ID){
  $stmt = DB->prepare("SELECT * FROM bank where user_id=?");
  $stmt->bind_param('i',$ID);
  $stmt->execute();
  return $stmt->get_result()->fetch_assoc();
}

function getDataBookBeingBorrowedByUserID($ID){
  $stmt = DB->prepare("SELECT * FROM transactions where user_id=? and end_date>=?");
  $today = date('Y-m-d');
  // echo $today.'<br><br>';
  // $today = '2024-11-16';
  $stmt->bind_param('is',$ID,$today);
  $stmt->execute();
  $res = $stmt->get_result();
  $dataBook = [];
  while ($row=$res->fetch_assoc()) {
    $dataBook[]=$row;
  }
  return $dataBook;
}

function getDataWishlistByUserID($ID){
  $stmt = DB->prepare("SELECT * from wishlist where user_id=?");
  $stmt->bind_param('i',$ID);
  $stmt->execute();
  $res = $stmt->get_result();
  $dataWishlist = [];
  while ($row=$res->fetch_assoc()) {
    $dataWishlist[]=$row;
  }
  return $dataWishlist;
}

function updateAv($user_id, $av){
  $av = (int)$av;
  $stmt = DB->prepare("UPDATE users SET avatar=? where id=?");
  $stmt->bind_param('ii',$av,$user_id);
  return $stmt->execute();
}

function updateDataUser($user_id, $dataPOST){
  $username = $dataPOST['username'];
  $email = $dataPOST['email'];
  $birth = $dataPOST['birth'];
  $password = $dataPOST['password'];
  if (empty($password)){
    $stmt = DB->prepare("UPDATE users SET username=?, email=?, birth=? where id=?");
    $stmt->bind_param('sssi',$username,$email,$birth,$user_id);
  }else {
    $stmt = DB->prepare("UPDATE users SET username=?, email=?, password=? birth=? where id=?");
    $stmt->bind_param('ssssi',$username,$email,$password,$birth,$user_id);
  }
  return $stmt->execute();
}

function getAllCat(){
  $sql = "SELECT * FROM categories order by id asc";
  $query = DB->query($sql);
  $res=[];
  while ($row=$query->fetch_assoc()) {
    $res[]=$row;
  }
  return $res;
}

function getBooksByCatID($catID){
  $stmt = DB->prepare("SELECT * FROM bookcategory, books where books.id=bookcategory.book_id and category_id=?");
  $stmt->bind_param('i',$catID);
  $stmt->execute();
  $res=$stmt->get_result();
  $bookByCat = [];
  while ($row=$res->fetch_assoc()) {
    $bookByCat[]=$row;
  }
  return $bookByCat;
}

function checkWhislist($bookID, $user_id){
  $stmt = DB->prepare("SELECT * FROM wishlist where user_id=? and book_id=?");
  $stmt->bind_param('ii',$user_id,$bookID);
  $stmt->execute();
  $res = $stmt->get_result();
  if ($res->num_rows>0) return true;
  else return false;
}

function getNumsWishlistBook($bookID){
  $stmt = DB->prepare("SELECT * FROM wishlist where book_id=?");
  $stmt->bind_param('i',$bookID);
  $stmt->execute();
  $res = $stmt->get_result();
  return $res->num_rows;
}

function addWishlist($bookID,$userID){
  $stmt=DB->prepare("INSERT into wishlist values(?,?,null)");
  $stmt->bind_param('ii',$userID,$bookID);
  return $stmt->execute();
}

function deleteWishlist($bookID,$userID){
  $stmt=DB->prepare("DELETE from wishlist where user_id=? and book_id=?");
  $stmt->bind_param('ii',$userID,$bookID);
  return $stmt->execute();
}

function getDurations(){
  $sql = "SELECT * from duration";
  $query = DB->query($sql);
  $res=[];
  while ($row = $query->fetch_assoc()) {
    $res[]=$row;
  }
  return $res;
}

function getCurrentBalance($user_id){
  $stmt=DB->prepare("SELECT current_balance FROM bank where user_id=?");
  $stmt->bind_param('i',$user_id);
  $stmt->execute();
  $res=$stmt->get_result()->fetch_assoc()['current_balance'];
  return $res;
}

function getPriceByDurationID($duration_id){
  $stmt = DB->prepare("SELECT price from duration where id=?");
  $duration_id=(int)$duration_id;
  $stmt->bind_param('i',$duration_id);
  $stmt->execute();
  return $stmt->get_result()->fetch_assoc()['price'];
}

function getDayByDurationID($duration_id){
  $stmt=DB->prepare("SELECT day from duration where id=?");
  $duration_id=(int)$duration_id;
  $stmt->bind_param('i',$duration_id);
  $stmt->execute();
  return $stmt->get_result()->fetch_assoc()['day'];
}

function reduceBalanceByUserID($user_id,$reducer){
  $stmt=DB->prepare("UPDATE bank set current_balance=current_balance-?,usage_balance=usage_balance+? where user_id=?");
  $stmt->bind_param('iii',$reducer,$reducer,$user_id);
  return $stmt->execute();
}

function addTransaction($user_id,$bookID,$duration_id){
  $price=getPriceByDurationID($duration_id);
  reduceBalanceByUserID($user_id,$price);

  $duration = getDayByDurationID($duration_id);  
  $startDate = date("Y-m-d");
  $endDate = date_create(date("Y-m-d"));
  date_add($endDate,date_interval_create_from_date_string("$duration days"));
  $endDate=date_format($endDate,"Y-m-d");

  $stmt=DB->prepare("INSERT into transactions 
  (id, transaction_code, user_id, book_id, duration_id, start_date, end_date, status, created_at) values
  (null,'test',?,?,?,?,?,null,null)");
  $stmt->bind_param('iiiss',$user_id,$bookID,$duration_id,$startDate,$endDate);
  $stmt->execute();
}

function getAllBooks(){
  $sql="SELECT * FROM books";
  $query=DB->query($sql);
  $res=[];
  while ($row=$query->fetch_assoc()) {
    $res[]=$row;
  }
  return $res;
}

function get10BooksMostWishlist(){
  $sql="SELECT count(*) as nWishlist,book_id as id,cover_src,title,author FROM wishlist,books where wishlist.book_id=books.id GROUP by book_id ORDER by nWishlist DESC LIMIT 10";
  $query=DB->query($sql);
  $res=[];
  while ($row=$query->fetch_assoc()) {
    $res[]=$row;
  }
  return $res;
}

function getTitleLikeQuery($query){
  $stmt = DB->prepare("SELECT id, title FROM books WHERE title LIKE ? LIMIT 10");
  $patt="%$query%";
  $stmt->bind_param('s',$patt);
  $stmt->execute();
  $results = $stmt->get_result();
  $data=[];
  while ($row=$results->fetch_assoc()) {
    $data[]=$row;
  }
  return $data;
}

function insertDataFeedback($user_id,$feedback){
  $stmt=DB->prepare("INSERT into feedback(user_id, feed) values(?,?)");
  $stmt->bind_param('is',$user_id,$feedback);
  return $stmt->execute();
}

function insertDataBank($id,$password){
  $stmt=DB->prepare("INSERT into bank (user_id,pin) values (?,?)");
  if (checkUserInBank($id,$password)===false){
    $stmt->bind_param('is',$id,$password);
    return $stmt->execute();
  }
  }

function checkUserInBank($user_id,$password){
  $stmt=DB->prepare("SELECT * FROM bank where user_id=? and pin=?");
  $stmt->bind_param('is', $user_id,$password);
  $stmt->execute();
  $result= $stmt->get_result();
  if ($result->num_rows>0) return true;
  else return false;
}

























// ====================transactions====================

function getTransactionByMonth($month) {
    $query = "SELECT
    SUM(duration.price)
    FROM transactions
    JOIN duration on duration.id = transactions.duration_id
    WHERE transactions.created LIKE '$month'";
}

function getMonthlyTotal() {
    $now = date('m');
    $query = "SELECT total FROM (SELECT transactions.created_at, SUM(duration.price) as total FROM transactions
    JOIN duration ON duration.id = transactions.duration_id
    GROUP BY MONTH(transactions.created_at)) as bulan WHERE bulan.created_at LIKE '%-$now-%'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getAnnualTotal() {
    $now = date('Y');
    $query = "SELECT total FROM (SELECT transactions.created_at, SUM(duration.price) as total FROM transactions
    JOIN duration ON duration.id = transactions.duration_id
    GROUP BY YEAR(transactions.created_at)) as tahun WHERE tahun.created_at LIKE '%$now-%'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getOverviewTotal() {
    $query = "SELECT transactions.created_at, SUM(duration.price) as total FROM transactions
    JOIN duration ON duration.id = transactions.duration_id
    GROUP BY MONTH(transactions.created_at) LIMIT 12;";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getEachMonthlyTotal() {
    $now = date('m');    
    $query = "SELECT * FROM (SELECT transactions.created_at, SUM(duration.price) as total FROM transactions
    JOIN duration ON duration.id = transactions.duration_id
    GROUP BY DAY(transactions.created_at)) as bulan WHERE bulan.created_at LIKE '%-$now-%'";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getEachAnnualTotal() {
    $now = date('Y');    
    $query = "SELECT * FROM (SELECT transactions.created_at, SUM(duration.price) as total FROM transactions
    JOIN duration ON duration.id = transactions.duration_id
    GROUP BY MONTH(transactions.created_at)) as bulan WHERE bulan.created_at LIKE '%$now-%'";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getTransactionCategory() {
    $query = "SELECT
    COUNT(books.id) as total_category,
    categories.name as name
    FROM transactions
    JOIN books ON books.id = transactions.book_id
    JOIN bookcategory ON bookcategory.book_id = books.id
    JOIN categories ON categories.id = bookcategory.category_id
    GROUP BY categories.name";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

// ====================User====================

function getAllDataUser() {
    return mysqli_query(DB, "SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);
}

function getDataUserByIdEncrypt($id) {
    $query = "SELECT * FROM users
    WHERE sha2(id, 256) = '$id'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function deleteDataUserByIdEncrypt($id) {
    $query = "DELETE FROM users
    WHERE sha2(id, 256) = '$id'";
    mysqli_query(DB, $query);
}

function getUserByEmail($email) {
    $query = "SELECT * FROM users
    WHERE email = '$email'
    LIMIT 1";
    return mysqli_query(DB, $query);
}

function getUserByEncryptEmail($email) {
    $query = "SELECT * FROM users
    WHERE sha2(email, 256) = '$email'
    LIMIT 1";
    return mysqli_query(DB, $query);
}

function getAllDataUserByEmail($email) {
    $query = "SELECT * FROM users
    WHERE sha2(email, 256) = '$email'
    LIMIT 1";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getAllDataUserByUsername($username) {
    $query = "SELECT * FROM users
    WHERE username = '$username'
    LIMIT 1";
    return mysqli_query(DB, $query);
}

function insertUserData($data) {
    $fullname = $data['fullname'];
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $birth = $data['birth'] == ''? null : $data['birth'];

    $query = "INSERT INTO users
    (fullname, username, email, password, birth)
    VALUES
    ('$fullname', '$username', '$email', '$password', '$birth')";
    mysqli_query(DB, $query);
}

function updateUserStatusByIdEncrypt($data) {
    $id = $data['id'];
    $status = $data['status'];
    $query = "UPDATE users
    SET status = '$status'
    WHERE sha2(id, 256) = '$id'
    ";

    mysqli_query(DB, $query);
}

// ====================Book====================

function insertBook($data) {
    $title = $data['title'];
    $description = $data['description'];
    $page = $data['page'];
    $author = $data['author'];
    $cover = $data['cover'];
    $overview = $data['overview'];
    $query = "INSERT INTO books (title, description, page, author, cover_src, overview)
    VALUES ('$title', '$description', '$page', '$author', '$cover', '$overview')";
    mysqli_query(DB, $query);
    return DB->insert_id;
}

function getAllDataBooks() {
    $query = "SELECT * FROM books";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getDataBookById($id) {
  $query = "SELECT *  FROM books WHERE id = '$id'";
  return mysqli_query(DB, $query)->fetch_assoc();
}

function updateBook($data) {
    $bookId = $data['book_id'];
    $title = $data['title'];
    $description = $data['description'];
    $page = $data['page'];
    $author = $data['author'];
    $overview = $data['overview'];
    $query = "UPDATE books SET
    title = '$title',
    description = '$description',
    page = '$page',
    author = '$author',
    overview = '$overview'
    WHERE id = '$bookId'";
    mysqli_query(DB, $query);
}

// ====================category====================

function deleteBookCategoryByBookId($id) {
  $query = "DELETE FROM bookcategory
  WHERE book_id = '$id'";
  mysqli_query(DB, $query);
}

function getCategories() {
  $query = "SELECT * FROM categories";
  return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function insertCategoriesById($id, $category) {
  $query = "INSERT INTO bookcategory VALUES ('$id', '$category')";
  mysqli_query(DB, $query);
}

function getCategoriesByBookId($id) {
  $query = "SELECT
  category_id
  FROM bookcategory
  WHERE book_id = '$id'";
  return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

// ====================topup====================

function getAllPendingRequest() {
  $query = "SELECT
  topup.bank_id,
  topup.status,
  topup.created_at,
  topup.nominal,
  users.username,
  users.fullname
  FROM topup
  JOIN bank ON topup.bank_id = bank.id
  JOIN users ON bank.user_id = users.id
  WHERE topup.status = 'pending'
  ORDER BY topup.created_at ASC";
  return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

// ====================Validations====================

function ValidateNominal($nominal) {
    if($nominal == '') {
        return [false, "Nominal harus diisi!"];
    } elseif($nominal[0] == '0') {
        return [false, "Nominal tidak boleh diawali angka 0"];
    } elseif(preg_match("/[a-zA-Z\s]/", $nominal)) {
        return [false, "Nominal tidak boleh mengandung huruf!"];
    }
    return [true, ""];
}

function validateUsername($username) {
    if($username == "") {
        return [false, "Username tidak boleh kosong!"];
    } elseif(strlen($username) < 8 || strlen($username) > 14) {
        return [false, "Minimal 8 karakter, maksimal 14 karakter!"];
    } elseif(!preg_match("/^[a-zA-Z\d\.\_]+$/", $username)) {
        return [false, "Hanya boleh terdiri dari (huruf, digit, titik atau garis bawah! )"];
    } elseif(mysqli_num_rows(getAllDataUserByUsername($username)) != 0) {
        return [false, "Username tidak tersedia!"];
    } else {
        return [true, ""];
    }
}

function validateFullName($fullname) {
    if($fullname == '') {
        return [false, 'Nama tidak boleh kosong!'];
    } elseif(!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
        return [false, 'Nama harus terdiri hanya dari huruf!'];
    }
    return [true, ''];  
}

function ValidateEmail($email) {
    if($email == '') {
        return [false, "Email tidak boleh kosong!"];
    } elseif(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        return [false, "Email tidak valid!"];
    } elseif(mysqli_num_rows(getUserByEmail($email)) != 0) {
        return [false, "Email telah terdaftar"];
    }
    return [true, ''];
}

function validateBirth($birth) {
    $waktuSekarang = date('Y-m-d');
    if($birth > $waktuSekarang || $birth === "") {
        return [false, "Anda belum lahir!"];
    }
    return [true, ''];
}

function getAllFeedback() {
    $query = "SELECT
    users.fullname,
    users.username,
    feedback.feed,
    feedback.is_read,
    feedback.id,
    feedback.created_at
    FROM feedback
    JOIN users ON feedback.user_id = users.id
    ORDER BY is_read ASC, feedback.created_at ASC";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getUnreadFeedbackLimit5() {
    $query = "SELECT
    users.fullname,
    users.username,
    feedback.feed,
    feedback.is_read,
    feedback.id,
    feedback.created_at
    FROM feedback
    JOIN users ON feedback.user_id = users.id
    WHERE feedback.is_read = 0
    ORDER BY is_read ASC, feedback.created_at ASC
    LIMIT 5";
    return mysqli_query(DB, $query)->fetch_all(MYSQLI_ASSOC);
}

function getCountUnreadFeedback() {
    $query = "SELECT * FROM feedback WHERE is_read = 0";
    return mysqli_query(DB, $query);
}

function readFeedback($id) {
    $query = "UPDATE feedback SET
    is_read = '1'
    WHERE id = '$id'";
    mysqli_query(DB, $query);
}

// ====================Server====================

function getAllServer() {
    $query = "SELECT * FROM server_status WHERE name = 'knsadnasasjfaall'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function getTopUpServer() {
    $query = "SELECT * FROM server_status WHERE name = 'njajfsbasbljajstopup'";
    return mysqli_query(DB, $query)->fetch_assoc();
}

function updateAllServer($status) {
    $query = "UPDATE server_status SET status = '$status' WHERE name = 'knsadnasasjfaall'";
    mysqli_query(DB, $query);
}

function updateTopUpServer($status) {
    $query = "UPDATE server_status SET status = '$status' WHERE name = 'njajfsbasbljajstopup'";
    mysqli_query(DB, $query);
}
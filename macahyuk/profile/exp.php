<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style>
        body {
            height: 100vh;
            overflow: hidden;
        }

        embed {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <?php 
    include_once '../database.php';
    if (isset($_GET['bberhvbuyefvbvirebvuiuerbuibguri'])){
      $book_id=$_GET['bberhvbuyefvbvirebvuiuerbuibguri'];
      $dataBook=getBookByID($book_id);
      $pdf_src=explode(':',$dataBook['cover_src']);
      if ($pdf_src[0]=='https'){
        $pdf_name='324findyourwhy324.pdf';
      }else {
        $pdf_name=explode('.',$dataBook['cover_src']);
        $pdf_name=$pdf_name[0].'.pdf';
      }
    }else {
      echo "<script>window.location.href='meminjam.php';</script>";
    }
    ?>
    <embed src="../assets/<?= file_exists('./assets/' . $pdf_name)? $pdf_name : '324findyourwhy324.pdf' ?>#toolbar=0" width="1000" height="500" type="application/pdf">
    <script>
        document.addEventListener("keydown", function (event){
            if (event.ctrlKey){
            event.preventDefault();
            }
            if(event.keyCode == 123){
            event.preventDefault();
            }
        });
    </script>
</body>
</html>
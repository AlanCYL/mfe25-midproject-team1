<?php

$id=$_GET["id"];
$content_id=$_GET["qa_content_id"];


require_once("../db-connect.php");
$sql="SELECT * 
FROM qa_content
JOIN qa ON qa_content.QA_id = qa.id
LEFT JOIN qa_reply on qa_content.QA_content_id = qa_reply.QA_content_id
WHERE qa_content.QA_id = '$id'
ORDER BY qa_content.QA_content_id DESC";

$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
//var_dump($rows);




?>
<!doctype html>
<html lang="en">
  <head>
    <title>QA-content-user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <?php //var_dump($row); ?>
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-4">
                  <div class="py-2">
                      <a class="btn btn-info text-white" href="QA-list-user.php">回列表</a>
                  </div>
                <?php foreach($rows as $row): ?>
                <div class="card">
                    <div class="card__avatar"></div>
                        <div class="card__body">
                            <div class="card__info">
                                <span class="card__author"><?=$row["QA_content_from_who"]?>:</span>
                            </div>
                            <p class="card__content"><?=$row["QA_content_text"] ?></p>
                            <p class="text-end"><?=$row["QA_content_create_time"] ?></p>
                        </div>
                </div>

                <div class="board__hr"></div>
                <div class="card" name="reply">
                    <div class="card__avatar"></div>
                        <div class="card__body">
                            <div class="card__info">
                                <span class="card__author">
                                    <?php if( NULL !== $row["QA_reply"]):?>
                                    <?php echo 'Admin:';?>
                                    <?php else:?>
                                    <?php echo '' ;?>
                                    <?php endif;?>   
                                </span>
                            </div>
                            <p class="card__content"><?=$row["QA_reply"] ?></p>
                            <p class="text-end"><?=$row["QA_reply_time"] ?></p>
                        </div>
                </div>
                <?php endforeach;?>
                <div class="board__hr"></div>
 
                <div class="reply">
                    <div class="container">
                        <form id="adminReply" name="adminReply" method="post" action="DoPost.php">
                            <div class="form-group">
                                <label for="adminReply" class="col-ms-6 control-label">回覆內容：</label>
                                    <div class="col-ms-6">
                                    <textarea class="form-control" rows="8" id="adminReply" name="adminReply"></textarea>
                                    </div>
                            </div>
                                <div class="button py-2">
                                <input type="submit" name="" 
                                id="button" value="回覆" class="btn btn-info"/>
                                </div>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="QA_content_id" value="<?= $content_id ?>">
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
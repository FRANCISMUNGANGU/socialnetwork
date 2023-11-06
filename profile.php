<?php
require_once( $_SERVER['DOCUMENT_ROOT']."/socialnetwork/config/core.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
            echo $user['name'];
            ?>
        </title>
        <meta http-equiv="refresh" content="180" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <style>
            /* #messages {
                /* By Default, Hidden */
                visibility: hidden;
                min-width: 250px;
                background-color: red;
                color: #fff;
                text-align: left;
                border-radius: 2px;
                padding: 16px;
                /* To always Keep on
                Top of screen */
                position: fixed;

                /* To be displayed above
                Parent HTML DOM element */
                z-index: 1;

                /* Position Bottom Left
                Corner of Screen */
                left: 10px;
                bottom: 30px;
            }

            /* Dynamically Appending this
            Class to #snackbar via JS */
            #messages.show{
                visibility: visible !important;
                /* fadeout Time decided in
                accordance to Total Time */
                /* In case, Time = 3s,
                fadeout 0.5s 2.5s */
                animation: fadein 0.5s, fadeout 0.5s 4.5s;
            
            }

            /* when the Snackbar Appears */
            @keyframes fadein {
                from {
                    bottom: 0;
                    opacity: 0;
                }
                to {
                    bottom: 30px;
                    opacity: 1;
                }
            }

            /* when the Snackbar Disappears
            from the Screen */
            @keyframes fadeout {
                from {
                    bottom: 30px;
                    opacity: 1;
                }
                to {
                    bottom: 0;
                    opacity: 0;
                }
            } */
            p {
                animation : buttons. 3s linear;
            }

        </style>
    </head>


    <body>
    <header class="p-3 text-bg-dark">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            Social Network
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
            <a type="button" class="btn btn-warning" href="lib/logout.php">Log-out <?php echo $user['name'];?></a>
            </div>
        </div>
        </div>
    </header>
  
        <div class="container">
   
            <div class="row">
            
                    
                        <p style='color:red'>
                            <?php
                                echo $_GET['msg'];
                            ?>
                        </p>
                    
                       
            </div>
       
            
        
            <br>

                
                
                <form method = "POST" action = "lib/post.php">
                    <textarea class="form-control form-control-lg" rows="6" placeholder="Enter your post here" name="post"  cols="40"></textarea><br>
                    <input class="btn btn-success btn-lg" type = "submit" value = "Post content"/>
                    
                    
                </form>
                <!-- <script>
                document.addEventListener("DOMContentLoaded", function(){
                    var btn = document.getElementById("myBtn");
                    var element = document.getElementById("myToast");

                    /* Create toast instance */
                    var myToast = new bootstrap.Toast(element, {
                        
                    });

                    btn.addEventListener("click", function(){
                        myToast.show();
                    });
                });
                </script> -->
            
                <h4></h4>

                <?php
                    $fetchposts = mysqli_query(
                        $connection,
                        "SELECT * FROM `posts` ORDER BY `id` DESC"
                    );

                    while($allposts = mysqli_fetch_array($fetchposts))
                    {
                    //get user who posted
                    $postownerid = $allposts['parent'];
                    $getuser = mysqli_query(
                        $connection,
                        "SELECT * FROM `users` WHERE `id` = '$postownerid'"
                    );
                    $postOwnerData = mysqli_fetch_array($getuser);
                    //end user who posted

    
                ?>
                <div class="card gedf-card mt-3">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $postOwnerData['name'];?></div>
                                    <div class="h7 text-muted">
                                        <?php
                                            $today = date('d-M-Y');
                                            $dissectdate = explode(" ",$allposts['created']);
                                            if($dissectdate[0] == $today)
                                            {
                                                echo "<i><span class='text-success'>Today at ".$dissectdate[1]."<span></i>";
                                            }else{
                                                echo $allposts[$created];
                                            }
                                        ?>
                                    </div>
                                    <div class="h7 text-muted"><?php echo $allposts['created']?></div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $allposts['post']?>
                        </p>
                    </div>
                    
                        <form method = "POST" action = "lib/comment.php">
                            <textarea class="form-control" rows="3" placeholder="Comment here" name="comment"  cols="40"></textarea><br>
                            <input type="hidden" name="postid" class="form-control" value="<?php echo $allposts['id']. $allcomments['id']?>"/>
                                <div class = "d-flex justify-content-between">
                                <input onclick="flashMessages()" class="btn btn-primary btn-md" type = "submit" value = "Comment"/>
                                </form>
                                <div id="messages">Comment made successfully...</div>
                                <script>
                                   
                                    function flashMessages() {
                                    var snackBar =
                                    document.getElementById('messages')
                                    // Dynamically Appending class
                                    // to HTML element
                                    snackBar.className = 'show';

                                    setTimeout(function () {
                                    // Dynamically Removing the Class
                                    // from HTML element
                                    // By Replacing it with an Empty
                                    // String after 5 seconds
                                    snackBar.className =
                                        snackBar.className.replace('show', '');
                                    }, 5000);
                                }
                                </script>
                        
                                <div>
                                    <form id="deleteForm" method = "POST" action = "lib/delete.php">
                                        <input type="hidden" name="id" class="form-control" value="<?php echo $allposts['id']?>"/>
                                        <input class="btn btn-danger btn-md" type = "submit" value = "Delete"/>
                                    </form>
                    
                                    <script>
                                        document.getElementById('deleteForm').addEventListener('submit', function(event) {
                                        event.preventDefault();
                                
                                        var confirmation = confirm("Are you sure you want to delete this post?");
                                        if (confirmation) {
                                        this.submit();
                                        }
                                        });
                                    </script> 
                                </div>
                                </div>
                       
                    <br>

                    <ul class="timeline">
                        <?php
                            $fetchcomments = mysqli_query(
                                $connection,
                                "SELECT * FROM `comments` WHERE `post` = '{$allposts['id']}' ORDER BY `id` DESC"
                            );

                            while($allcomments = mysqli_fetch_array($fetchcomments))
                            {
                            //get user who commented
                            $getuserWhoCommented = mysqli_query(
                                $connection,
                                "SELECT * FROM `users` WHERE `id` = '{$allcomments['user']}'"
                            );
                            $commentOwnerData = mysqli_fetch_array($getuserWhoCommented);
                            //end user who commented
                        ?>

                            <li>
                                <a href="#"><?php echo $commentOwnerData['name'];?></a><br>
                                <span class="float-right text-muted"><?php echo $allcomments['created'];?></span>
                                <p>
                                    <?php
                                        echo $allcomments['comment'];
                                    ?>
                                </p>
                            </li>
                        
                        <?php
                        }
                        ?>
                    </ul> 
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
                </div>
                <?php
                }
            
                ?>
            </div>
        </div>
        <footer class="py-3 my-4">
            <img src="Communicate.net.png" style="width:90px;" class="rounded-circle mx-auto d-block"/>
            <p class="text-center text-muted">© 2023 F tech, Inc</p>
        </footer>
    </body>  
</html>
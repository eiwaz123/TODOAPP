<?php
include_once('process/config.php');
session_start();
if(!$_SESSION['username']){
header('location:login.php');    
}
$username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <title>TO DO APP</title>
</head>
<body>
    
   <div class="profile">
   <?php echo'<h4>'.$username.' </h4>' ?>
    <a href="#" class="link-secondary link-offset-2 link-underline-opacity-100 link-underline-opacity-100-hover" >Logout</a>
    </div>
<header> 
    <div class="titles">
     <h1>TO DO APP</h1>
     <img src="images/orange-lined-notepaper-journal-sticker-vector_53876-177481.jpg" alt="logo" srcset="" width="100px">
     </div>

    <hr>
</header>
<main>
   
   
    <div class="input-todo" >
        <div class="container">
            <form id="todo" action="process/taskinput.php" method="post">
                <div class="form-group">
                    <label for="Task">Task Name</label>
                    <input type="text" class="form-control" id="taskname" name="task" placeholder="Add Task" required>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="task-type" id="task-type" value="Business" checked>
                    <label class="btn btn-primary" for="task-type">
                    Business
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="task-type" id="task-type" value="Work Out">
                    <label class="btn btn-danger" for="task-type">
                    Work out
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="task-type" id="task-type" value="Games">
                    <label class="btn btn-warning" for="task-type">
                    Games
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="task-type" id="task-type" value="Study">
                    <label class=" btn btn-success" for="task-type">
                    Study
                    </label>
                </div> 
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="task-type" id="task-type" value="etc...">
                    <label class="btn btn-secondary" for="task-type"> etc...</label>
                </div>
            

                <div class="form-check">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary" >Add Task</button>
                </div>

                    
            </form>

        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="container">
        <table class="table table-hover table-bordered ">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Type</th>
                    <th>Date added</th>
                    <th>Date Finished</th>
                    <th>Manage</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tasks";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<th scope ="row">' . $row['id'] . '</th>';
                        echo '<td>' . $row['task'] .'</td>';
                        echo '<td>' . $row['type'] . '</td>';
                        echo '<td>' . $row['datein'] . '</td>';
                        if($row['dateout']=='0000-00-00'){
                                echo'<td></td>';
                        }
                        else{
                        echo '<td>' . $row['dateout'] . '</td>';
                    }
                        echo '<td>  
                        <button class="btn btn-danger"><a href="process/delete.php?id=' . $row['id'] . '" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" >Delete</a></button> 
                        <button class="btn btn-success"><a href="process/done.php?id=' . $row['id'] . '" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" >Done</a></button></td> ' ;
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
                }
                
                
                
                ?>
            </tbody>

        </table>
    </div>
</main>


<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script src="static/script.js"></script>
</body>
</html>
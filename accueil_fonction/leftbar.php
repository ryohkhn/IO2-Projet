<div class="homecontainer">
    <header class="splithomeleft">
        <div class="homeprofilpic">
            <?php
            $id=$_SESSION['id'];
            $connexion=connect();
            $req="SELECT * FROM profil WHERE profil_id='$id'";
            $query=mysqli_query($connexion,$req);
            $fetchquery=mysqli_fetch_assoc($query);
            echo '<img src="./profil/'.$fetchquery['pp_pic'].'" alt="profil_pic" class="profilpic">';
            ?>
        </div>
        <span class="homenickname">
            <h2><?php echo $_SESSION['nickname']; ?></h2>
        </span>
        <span class="homenickname">
            <p>@<?php echo $_SESSION['nickname']; ?></p>
        </span>
        <div class="homeinfo">
            <div>
                <p>
                <?php 
                $query=mysqli_query($connexion,"SELECT * FROM relationships WHERE followed_id='$id'");
                $fetchquery=mysqli_num_rows($query);
                echo $fetchquery;
                ?>
                </p>
                <p>Followers</p>
            </div>
            <div>
            <p>
                <?php 
                $query=mysqli_query($connexion,"SELECT * FROM post WHERE post_id='$id'");
                $fetchquery=mysqli_num_rows($query);
                echo $fetchquery;
                ?>
                </p>
                <p>Posts</p>
            </div>
            <div>
                <p>
                <?php 
                $query=mysqli_query($connexion,"SELECT * FROM relationships WHERE follower_id='$id'");
                $fetchquery=mysqli_num_rows($query);
                echo $fetchquery;
                ?>
                </p>
                <p>Following</p>
            </div>
        </div>
        <div class="separator"></div>
        <div class="barlinkscontainer">
            <div class="barlinksdiv">
                <a href="./accueil.php" class="barlinks"><i class="material-icons">home</i></a>
                <a href="./accueil.php" class="barlinks"> Accueil</a>
            </div>
            <div class="barlinksdiv"> 
                <a href="./profil.php" class="barlinks"><i class="material-icons">account_circle</i></a>
                <a href="./profil.php" class="barlinks"> Profil</a>
            </div>
            <?php
            if(isAdmin()){
                echo '<div class="barlinksdiv">';
                echo '<a href="./profil.php" class="barlinks"><i class="material-icons">report</i></a>';
                $query=mysqli_query($connexion,"SELECT * FROM reports");
                $rows=mysqli_num_rows($query);
                if($rows!=0){
                    echo '<a href="./reports/adminreports.php" class="barlinks"> Nouveaux signalements</a>';
                }
                else{
                    echo '<a href="./reports/adminreports.php" class="barlinks"> Aucun signalement</a>';
                }
                
                echo '</div>';
            }
            ?>
            <div class="barlinksdiv"> 
                <a href="./accueil_fonction/logout.php" class="barlinks"><i class="material-icons">power_settings_new</i></a>
                <a href="./accueil_fonction/logout.php" class="barlinks"> Déconnexion</a>
            </div>
        </div>
        <?php
        if(isAdmin()){
            echo '<div>';
            if(isSuperAdmin()){
                echo '<p class="baradminmessage">Compte super administrateur</p>';
            }
            else{
                echo '<p class="baradminmessage">Compte administrateur</p>';
            }
            echo '</div>';
        }
        ?>
    </header>
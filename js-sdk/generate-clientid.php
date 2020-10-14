<?php
//include "db-connect.php";
function createSDKFile($id){
    
    return base64_encode($id);
}
$ale='';
if(isset($_POST['save'])){
    $ale = createSDKFile(htmlspecialchars($_POST['id'])); 
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, ">
<script src="http://docs-kabeersnetwork-kview-app-sta.rf.gd/cdn/auto-attr/1.0.1/auto-attr.js"></script>
<link rel="stylesheet" href="http://z3b2j7q2.hostrycdn.com/CDNs/Bootstrap-4.2.4/Css/bootstrap.css">
<div class="container">
<a href="index.php">JS SDK Generator</a>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-5 py-5">
        <?php echo $ale;?>
            <div style="width: 5rem;height: auto" class="ml-auto mr-auto py-4">
                <svg height="5rem" width="5rem" xmlns="http://www.w3.org/2000/svg" viewBox="21 21 470 470"><linearGradient id="a" x1="61.119%" x2="29.146%" y1="11.82%" y2="84.194%"><stop offset="0" stop-color="#4e5aa0"/><stop offset="1" stop-color="#4c5da9"/></linearGradient><linearGradient id="b" x1="50%" x2="50%" y1="0%" y2="100%"><stop offset="0" stop-color="#6b91c8"/><stop offset="1" stop-color="#618ac3"/></linearGradient><linearGradient id="c" x1="50%" x2="50%" y1="0%" y2="100%"><stop offset="0" stop-color="#6fc69d"/><stop offset="1" stop-color="#66c296"/></linearGradient><g fill="none" fill-rule="evenodd"><path d="M256 491V21C126.213 21 21 126.213 21 256s105.213 235 235 235z" fill="#d3e1f2"/><path d="M256 491V21c129.787 0 235 105.213 235 235S385.787 491 256 491z" fill="#5364ae"/><path d="M491 490.99L445.754 43.738l-187.36 202.316a239.077 239.077 0 0 0-.206 9.946c0 129.057 104.033 233.815 232.812 234.99z" fill="url(#a)" transform="matrix(-1 0 0 1 749.188 0)"/><path d="M256 491V21c-68.483 0-124 105.213-124 235s55.517 235 124 235z" fill="url(#b)"/><path d="M380 491V21c-68.483 0-124 105.213-124 235s55.517 235 124 235z" fill="url(#c)" transform="matrix(-1 0 0 1 636 0)"/></g></svg>
            </div>
            <div style="text-align: center;">
                <small class="text-muted">Create Your K Auth 2.0  JavaScript SDK Client ID</small>
            </div>
            <br>
            <form action="" method="post">
                <input autocomplete="no" class="form-control my-2" type="text" name="id" placeholder="Client ID,  Ex: 123456">
                <br class="divider">
                <input class="form-control btn btn-primary my-2" type="submit" name="save" value="Create" placeholder="Add">
            </form>
        </div>
    </div>
</div>
<footer class="text-center text-muted border-top pt-2 small">
    &copy;
    <span class="dateTime"></span>
    <script>document.querySelector('.dateTime').innerHTML=new Date().getFullYear()</script>
    Kabeers Network - All Rights Reserved
</footer>
<style>
    *{margin: 0;padding: 0;box-sizing: border-box!important;}
</style>
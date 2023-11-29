<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
     crossorigin="anonymous">
    <title>Home</title>
    
</head>
<body>

    <!-- Header Section -->
    <?php include 'header.php'; ?>

    <div class="card-header">
        <h1 class="card-title">Thank You for Visiting Our Site!!!</h1>
        <p>
            Hello <?php echo getRandomUsername(); ?>, thank you for visiting our website.
        </p>
    </div>
    <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Software Developers</h5>
        <p class="card-text">We support our community with uptodate technical content.</p>
        <a href="#" class="btn btn-primary">Join Us</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Software Developers</h5>
        <p class="card-text">We support our community with uptodate technical content.</p>
        <a href="#" class="btn btn-primary">Join Us</a>
      </div>
    </div>
  </div>
</div>
    <div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        

        <div class="col-sm-6">
        <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
            <p class="card-text">
            <p>We're thrilled to have you here. Get ready for an incredible journey filled with amazing content, exciting features, and a community that's as fantastic as you are.</p>
            <p>Feel free to explore, discover, and make yourself at home. If you have any questions or need assistance, our team is here to help.</p>
            <p>Thank you for choosing us. Let the adventure begin!</p>
            </p>
            <a href="#" class="card-link">Browse More!!</a>
            <a href="#" class="card-link">Proceed</a>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>

</body>
</html>

<?php
// Function to get a random system username
function getRandomUsername() {
    // Replace this logic with your own method of obtaining a system username
    $usernames = ['Job', 'John', 'Mary', 'Jane'];
    $randomIndex = array_rand($usernames);
    return $usernames[$randomIndex];
}
?>

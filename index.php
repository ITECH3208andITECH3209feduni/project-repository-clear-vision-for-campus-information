<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Enquiry form</h2>
    <form action="register_handler.php" method="POST">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Your Name*" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Your Email*" name="email" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" placeholder="Your Message*" name="message" rows="5" required></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>


<?php
include("cusconnection.php");
include("nav.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="fixed">
Contact No:7708145488
</div>

    <center><h2 id='h'>Grocer Ease: Simplifying the Shop Operation</h2></center>
    <center><h1 id='h'>Selvaraj Grocery</h1></center>


    <!-- History of the shop -->
    <section class="history-section">
       
        <p class="attractive-paragraph">
    <span class="highlight">Welcome to Selvaraj Grocery!</span><br><br>
    At Selvaraj Grocery, we take pride in our rich history deeply rooted in the heart of our community. Our journey began with the vision of Samy Ayya, who founded this humble shop with a mission to serve our neighborhood with dedication and integrity.<br><br>
    <span class="subheading">A Legacy of Trust and Commitment</span><br>
    Samy Ayya's unwavering commitment to excellence and customer satisfaction laid the foundation for what Selvaraj Grocery represents today. Over the years, our shop has evolved into more than just a place to buy essentials; it has become a cornerstone of our community—a trusted ally in every household's daily life.<br><br>
    <span class="subheading">Passing the Torch: Selvaraj Continues the Legacy</span><br>
    Following in his father's footsteps, Selvaraj has embraced the responsibility of carrying forward the values and traditions instilled by Samy Ayya. With a deep understanding of our community's needs and a relentless passion for service, Selvaraj has guided the shop towards greater heights, earning the continued trust and loyalty of our patrons.<br><br>
    <span class="subheading">A Beacon of Trust for Generations</span><br>
    From the days of Samy Ayya to the present, Selvaraj Grocery has been synonymous with reliability, quality, and convenience. Generations of families have entrusted us with their daily needs, making us an integral part of their lives. It's this unwavering belief and support from our customers that inspire us to constantly innovate and improve, ensuring that we remain your preferred choice for all your shopping needs.<br><br>
    <span class="subheading">Join Us in Our Journey</span><br>
    As we continue to evolve and adapt to changing times, our commitment to simplifying your shopping experience remains steadfast. Whether you're a long-time patron or someone discovering Selvaraj Grocery for the first time, we invite you to join us in our journey as we strive to make your life easier, one grocery at a time.<br><br>
    <span class="subheading">Experience the Selvaraj Grocery Difference</span><br>
    Explore our wide range of products, convenient services, and personalized customer care that sets us apart. Discover why Selvaraj Grocery is more than just a shop—it's a trusted companion in your daily life.<br><br>
    <span class="highlight">Welcome to Selvaraj Grocery—where shopping is not just a task, but an experience rooted in tradition, trust, and community.</span>
</p>
    </section>
    <br>
<br>
<br><br>
<br>

<br>
<br>
    <!-- Items as images in a table -->
    <section class="items-section">
        <h2>Few Items</h2>
        <!-- Assuming your images are within a table -->
        <table border=1px>
            <tr>
            <td>
            <img src="rice.jpeg"width="186" height="186"></td>
            <td>
            <img src="ponni.jpeg" width="186" height="186"></td>
            <td>
            <img src="basumathi.jpeg" width="186" height="186"></td>
            <td>
            <img src="blackurad.jpeg"width="186" height="186">
            </td>
            <td>
            <img src="urad.jpeg"width="186"height="186"></td>
            <td>
            <img src="dhall.jpeg"width="186"height="186"></td>
            <td>
            <img src="bengal.jpeg"width="186"height="186"></td>
            <td>
            <img src="toor.jpeg"width="186"height="186"></td>
            </tr>
            <tr>
                <td>Rice</td>
                <td>Ponni Rice</td>
                <td>Basumathi Rice</td>
                <td>Blackurad Dhall</td>
                <td>Urad Dhall</td>
                <td>Mung Dhall</td>
                <td>Bengal Gram Dhall</td>
                <td>Toor Dhall</td>
            </tr>
            <tr>
            <td>
            <img src="sugar.jpeg"width="186" height="186"></td>
            <td>
            <img src="salt.jpeg" width="186" height="186"></td>
            <td>
            <img src="oil.jpeg" width="186" height="186"></td>
            <td>
            <img src="chilli.jpeg"width="186" height="186">
            </td>
            <td>
            <img src="spices.jpeg"width="186"height="186"></td>
            <td>
            <img src="coco.jpeg"width="186"height="186"></td>
            <td>
            <img src="drinks.jpeg"width="186"height="186"></td>
            <td>
            <img src="stationery.jpeg"width="186"height="186"></td>
            </tr>
            <tr>
                <td>Sugar</td>
                <td>Salt</td>
                <td>Oil</td>
                <td>Red Chilli</td>
                <td>Whole Spices</td>
                <td>Coconut</td>
                <td>Cool Drinks</td>
                <td>Stationery</td>
            </tr>
        </table>
        
    </section>
    <br>
   <div class="main">
       <ul class="one">
        <li class="two"><a  class="aa" href="https://web.whatsapp.com/" target="_blank">
        <i class='bx bxl-whatsapp'></i>
        </a></li>
        <li class="two"><a class="aa" href="https://www.instagram.com/accounts/onetap/?next=%2F" target="_blank">
        <i class='bx bxl-instagram'></i>
        </a></li>
       </ul>
   </div>
<button onclick="scrollToTop()" id="scrollBtn">
<i class='bx bx-chevrons-up bx-tada bx-rotate-90' ></i>
</button>
<script>
    // Get the button
var scrollBtn = document.getElementById("scrollBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollBtn.style.display = "block";
    } else {
        scrollBtn.style.display = "none";
    }
};

// When the user clicks on the button, scroll to the top of the document
function scrollToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

</script>
</body>
</html>

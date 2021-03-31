<?php
session_start();
include 'connect.php';

if (isset($_SESSION["loggedin"])) {
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Enterprise</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <?php include('components/navbar.php'); ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Privacy Policy for Seven7h Edu Course</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Privacy Policy</li>
                </ol>
                <p>At HeySeven7h, accessible from http://seven7h-edu.atwebpages.com/heyseven7h/enterprise, one of our
                    main priorities is the privacy of our visitors. This Privacy Policy document contains types of
                    information that is collected and recorded by HeySeven7h and how we use it.</p>

                <p>If you have additional questions or require more information about our Privacy Policy, do not
                    hesitate to contact us.

                <h2>Log Files</h2>

                <p>HeySeven7h follows a standard procedure of using log files. These files log visitors when they visit
                    websites. All hosting companies do this and a part of hosting services' analytics. The information
                    collected by log files include internet protocol (IP) addresses, browser type, Internet Service
                    Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These
                    are not linked to any information that is personally identifiable. The purpose of the information is
                    for analyzing trends, administering the site, tracking users' movement on the website, and gathering
                    demographic information.</p>

                <h2>Cookies and Web Beacons</h2>

                <p>Like any other website, HeySeven7h uses 'cookies'. These cookies are used to store information
                    including visitors' preferences, and the pages on the website that the visitor accessed or visited.
                    The information is used to optimize the users' experience by customizing our web page content based
                    on visitors' browser type and/or other information.</p>

                <p>For more general information on cookies, please read <a
                        href="https://www.privacypolicyonline.com/what-are-cookies/">"What Are Cookies" from Cookie
                        Consent</a>.</p>

                <h2>Privacy Policies</h2>

                <P>You may consult this list to find the Privacy Policy for each of the advertising partners of
                    HeySeven7h.</p>

                <p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that
                    are used in their respective advertisements and links that appear on HeySeven7h, which are sent
                    directly to users' browser. They automatically receive your IP address when this occurs. These
                    technologies are used to measure the effectiveness of their advertising campaigns and/or to
                    personalize the advertising content that you see on websites that you visit.</p>

                <p>Note that HeySeven7h has no access to or control over these cookies that are used by third-party
                    advertisers.</p>

                <h2>Third Party Privacy Policies</h2>

                <p>HeySeven7h's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising
                    you to consult the respective Privacy Policies of these third-party ad servers for more detailed
                    information. It may include their practices and instructions about how to opt-out of certain
                    options. </p>

                <p>You can choose to disable cookies through your individual browser options. To know more detailed
                    information about cookie management with specific web browsers, it can be found at the browsers'
                    respective websites. What Are Cookies?</p>

                <h2>Children's Information</h2>

                <p>Another part of our priority is adding protection for children while using the internet. We encourage
                    parents and guardians to observe, participate in, and/or monitor and guide their online activity.
                </p>

                <p>HeySeven7h does not knowingly collect any Personal Identifiable Information from children under the
                    age of 13. If you think that your child provided this kind of information on our website, we
                    strongly encourage you to contact us immediately and we will do our best efforts to promptly remove
                    such information from our records.</p>

                <h2>Online Privacy Policy Only</h2>

                <p>This Privacy Policy applies only to our online activities and is valid for visitors to our website
                    with regards to the information that they shared and/or collect in HeySeven7h. This policy is not
                    applicable to any information collected offline or via channels other than this website.</p>

                <h2>Consent</h2>

                <p>By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.
                </p>
            </div>
        </main>
        <?php include('components/footer.php'); ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>
<?php

}
else{
    header("location:login.php");
}
?>
<? $this->load->view('includes/header') ?>
<!-- End Header -->
      <style>
        /* Internal CSS */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            color: #666;
            margin-bottom: 10px;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .section {
            margin-bottom: 30px;
        }

        .question {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .answer {
            color: #666;
            margin-bottom: 10px;
        }

        .troubleshooting {
            margin-top: 30px;
        }

        .issue {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .solution {
            color: #666;
            margin-bottom: 10px;
        }

            .solution ul {
                list-style-type: disc;
                margin-left: 20px;
            }
    </style>    

    <div class="content">
        <div class="section">
            <h2>FAQ</h2>
            <div class="question">Q: How do I reset my password?</div>
            <div class="answer">A: To reset your password, click on the "Forgot Password" link on the login page. Follow the instructions provided to reset your password.</div>

            <div class="question">Q: How do I contact customer support?</div>
            <div class="answer">A: To contact our customer support team, you can send an email to expatshubteam@gmail.com or call our toll-free number at 1-660-528-XXXX.</div>
        </div>

        <div class="section">
            <h2>Troubleshooting</h2>
            <div class="issue">Issue: I can't access certain features on the website.</div>
            <div class="solution">
                Solution:
                <ul>
                    <li>Clear your browser cache and cookies, then try accessing the features again.</li>
                    <li>Make sure you are using a supported browser version. Update your browser if necessary.</li>
                    <li>Contact our support team for further assistance.</li>
                </ul>
            </div>

            <div class="issue">Issue: I'm experiencing slow loading times on the website.</div>
            <div class="solution">
                Solution:
                <ul>
                    <li>Check your internet connection. A slow or unstable connection can affect website loading times.</li>
                    <li>Close any unnecessary browser tabs or applications that may be using up bandwidth.</li>
                    <li>Try accessing the website at a different time of day when internet traffic is lower.</li>
                </ul>
            </div>
        </div>
    </div>
 <!-- ======= Footer ======= -->
 <? $this->load->view('includes/footer') ?>
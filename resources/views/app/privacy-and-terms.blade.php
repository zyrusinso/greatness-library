<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="icon" href="{{asset('assets/img/Library.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('assets/img/Library.png')}}" type="image/x-icon">
        <title>Privacy And Terms {{ $title }}</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <style>
            body {
                width: 650px;
                font-family: work-Sans, sans-serif;
                background-color: #f6f7fb;
                display: block;
            }
            a {
                text-decoration: none;
            }
            span {
                font-size: 14px;
            }
            p {
                font-size: 13px;
                line-height: 1.7;
                letter-spacing: 0.7px;
                margin-top: 0;
            }
            .text-center {
                text-align: center;
            }
        </style>
    </head>
    <body style="margin: 30px auto;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <table style="background-color: #f6f7fb; width: 100%;">
                            <tbody>
                                <tr>
                                    <td>
                                        <table style="width: 650px; margin: 0 auto; margin-bottom: 30px;">
                                            <tbody>
                                                <tr>
                                                    <td width="25%">
                                                        <a href="{{ route('index') }}" class="align-self-center"><img class="img-fluid logo-mobile" src="{{asset('assets/img/logo.png')}}" alt="" width="70" height="70"></a>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column text-center" style="margin-left: 5px; color: #24695c; margin-top: 3px;">
                                                            <h3 style="font-weight: bold;">GREATNESS LIBRARY</h3>
                                                            <span style="margin-top: -13px;">(Library Management System)</span>
                                                        </div>
                                                    </td>
                                                    <td style="text-align: right; color: #999;"><span>Privacy And Terms</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 30px;">
                                                        <b>Privacy Policy </b>
                                                        <p>At Greatness Library Management System, we are committed to protecting the privacy of the students. We collect only the information that is necessary to provide our services, and we take all reasonable steps to ensure that this information is kept secure and confidential. </p><br>
                                                        <p>In order to use our library services, we require the students to provide us with certain personal information, such as their name, contact information, and student ID information. This information is used to track the students' borrowing activity, manage library accounts, and provide a monitored schedule of returning books. </p><br>
                                                        <p>We do not share students personal information with any third parties, except as required by law. We take appropriate measures to protect the security of students' information, including encryption and secure storage of data.</p><br>
                                                        <p>The students have the right to access, rectify, erase, or restrict the processing of their personal information at any time. They can exercise these rights by contacting our library staff.</p><br>
                                                        <p>We may update this privacy policy from time to time in order to reflect any changes to our practices or to comply with new legal requirements. We encourage the students to review this policy periodically to stay informed about our privacy practices.</p><br>
                                                        <br>
                                                        <b>Terms of Services</b>
                                                        <p>At Greatness Library Management System, we provide a range of library services to the students. These services are subject to the following terms and conditions:</p><br>
                                                        <ol style="font-size: 14px">
                                                            <li>The students must show their School ID in order to borrow materials or access our digital collections.</li>
                                                            <li>The students are responsible for returning borrowed materials on time and in good condition. Late fees are charged ₱3.00/day excluding holidays and weekends for the materials that are returned past their due date.</li>
                                                            <li>The Students are responsible for any lost or damaged materials. A student may replace the same book that was lost or pay the worth of the book as determined by the librarian.</li>
                                                            <li>The Students are responsible for the security of their accounts password and should not share it with anyone else.</li>
                                                            <li>We reserve the right to stop or prevent a student from getting their credentials to this university if they violate these terms and conditions or engage in any inappropriate or illegal behavior while using our services. Unpaid library bills/unreturned books for students are sent to the registrar's office at the end of the semester for diploma, transcript, grade, and registration holds.</li>
                                                            <li>No student may keep a book for more than three (3) consecutive weeks. Renewal is done in person or via email at the  site on or before the due date.</li>
                                                            <li>We reserve the right to update these terms and conditions from time to time, and we encourage the students to review them periodically.
                                                                By using our library services, the students acknowledge and agree to these terms and conditions. If you have any questions or concerns, please contact our library staff.
                                                                </li>
                                                        </ol>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width: 650px; margin: 0 auto; margin-top: 30px;">
                                            <tbody>
                                                <tr style="text-align: center;">
                                                    <td>
                                                        <p style="color: #999; margin-bottom: 0;">Quezon City University</p>
                                                        <p style="color: #999; margin-bottom: 0;">Copyright {{date('Y')}}-{{date('y', strtotime('+1 year'))}} © <a href="#" style="color: #24695c">Group 9 SBIT-1A</a></p>
                                                        <p style="color: #999; margin-bottom: 0;">All rights reserved.</p>
                                                    </td>
                                                </tr>
                                                <tr style="text-align: center">
                                                    <td><a href="{{ route('register') }}" style="color: #24695c; font-size: 14px; text-transform: capitalize; font-weight: 600; margin: 0; text-decoration: underline; align: center">Go back to Registration Page</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

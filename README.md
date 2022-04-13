<div id="top"></div>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">

<h3 align="center">Learning Management System</h3>

  <p align="center">
    Learning Management System made in vanilla PHP to learn core concepts and usage of some basic utils.
    <br />
    <a href="https://github.com/dk3775/lms/issues">Report Bug</a>
    ·
    <a href="https://github.com/dk3775/lms/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)


<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [PHP](https://www.php.net/)
* [MySQL](https://www.mysql.com/)
* [HTML5](https://www.w3.org/TR/html5/)
* [CSS3](https://www.w3.org/Style/)
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Installation

1. Clone the repo in server folder(eg. htdocs, public_html)
   ```sh
   git clone https://github.com/dk3775/lms.git
   ```
2. Install dependencies
   ```sh
   composer install
   ```
3. Download database template file from here -->
    <a href="https://ln5.sync.com/dl/98f230710/a3ct86ip-yisxxud3-uuqdz9pj-q2xzgzd9"> lms.sql </a>
4. Open phpmyadmin and create a database named "lms" and import database template from downloaded file.

5. Create a .env file in root directory of your and paste this code in it
   ```sh
   DB_HOST="localhost"
   DB_USER="root"
   DB_PASS=""
   DB_NAME="lms"
   SMTP_HOST="your smtp host"
   SMTP_USER="your smtp username"
   SMTP_PASS="your password"
   SMTP_PORT="your smtp port"
   ```
   
6. Modify .env file contents as per your needs.

7. Open project's root directory in server it will automatically open login page if above steps will be followed properly.

8. Login as Institute with following credentials Username - "AJ" and Password - "1234".

9. Play around the system and if you need any help contact me. 

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

This System can be used by Educational Institutions, Schools, Colleges, Universities, and other educational organizations. To manage the data of their students, teachers, and courses, they can use this system.



<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Dhyey K - [@DhyeyHk](https://twitter.com/DhyeyHk) - dk@titanslab.in

Project Link: [https://github.com/dk3775/lms](https://github.com/dk3775/lms)

Anjan P - anjan@titanslab.in

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Malven's Flexbox Cheatsheet](https://flexbox.malven.co/)
* [Malven's Grid Cheatsheet](https://grid.malven.co/)
* [Img Shields](https://shields.io)
* [GitHub Pages](https://pages.github.com)
* [Font Awesome](https://fontawesome.com)
* [React Icons](https://react-icons.github.io/react-icons/search)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/dk3775/lms.svg?style=for-the-badge
[contributors-url]: https://github.com/dk3775/lms/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/dk3775/lms.svg?style=for-the-badge
[forks-url]: https://github.com/dk3775/lms/network/members
[stars-shield]: https://img.shields.io/github/stars/dk3775/lms.svg?style=for-the-badge
[stars-url]: https://github.com/dk3775/lms/stargazers
[issues-shield]: https://img.shields.io/github/issues/dk3775/lms.svg?style=for-the-badge
[issues-url]: https://github.com/dk3775/lms/issues
[license-shield]: https://img.shields.io/github/license/dk3775/lms.svg?style=for-the-badge
[license-url]: https://github.com/dk3775/lms/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/dk21
[product-screenshot]: images/screenshot.png

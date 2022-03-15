<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        @import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";

        html,
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        #context-menu {
            position: fixed;
            top: 100px;
            left: 10px;
            background: #fdfdfd;
            width: 250px;
            box-shadow: 3px 3px 5px 3px rgba(0, 0, 0, 0.10);
            border-radius: 5px;
            transform: scale(0);
            transform-origin: top left;
            z-index: 999999999999999;
        }

        #context-menu.visible {
            transform: scale(1);
            transition: transform 250ms ease-in-out;
            z-index: 999999999999999;
        }

        #context-menu .list {
            border-bottom: 1px solid #eee;
        }

        #context-menu .item {
            position: relative;
            padding: 10px;
            font-size: 14px;
            color: #555;
            cursor: pointer;
        }

        #context-menu .item i {
            display: inline-block;
            width: 20px;
            margin-right: 5px;
        }

        #context-menu .item:before {
            content: "";
            position: absolute;
            top: 0px;
            left: 0px;
            width: 0%;
            height: 100%;
            background: #eee;
            z-index: -1;
            transition: all 150ms ease-in-out;
        }

        #context-menu .list .item:hover:before {
            width: 100%;
        }
    </style>
    <?php include_once("../head.php"); ?>
</head>

<body>
    <div id="context-menu">
        <div class="list">
            <div class="item" onclick="javascript:history.go(0);">
                <a class="nav-item" style="color: #6F6F6F;">
                    <i class="fa uil-refresh"></i>
                    Refresh</a>
            </div>
            <div class="item" onclick="window.location.href='logout.php';">
                <a class="nav-item" style="color: #6F6F6F;">
                    <i class="fa uil-signout"></i>
                    Logout</a>
            </div>
        </div>
        <div class="list">
            <div class="item" onclick="window.location.href='subject.php';">
                <a class="nav-item" style="color: #6F6F6F;">
                <i class="fe fe-file"></i>
                    Subjects</a>
            </div>
            <div class="item" onclick="window.location.href='update_list.php';">
                <a class="nav-item" style="color: #6F6F6F;">
                <i class="fe fe-bell"></i></i>
                    Updates</a>
            </div>
            <div class="item" onclick="window.location.href='assignment_list.php';">
                <a class="nav-item" style="color: #6F6F6F;">
                    <i class="fe uil-book"></i>
                    Assignment list</a>
            </div>
            <div class="item" onclick="window.location.href='timetable_view.php';">
                <a class="nav-item" style="color: #6F6F6F;">
                <i class="fe uil-calendar-alt"></i>
                    Time Table</a>
            </div>
        </div>
        <div class="list">
            <div class="item" onclick="window.location.href='account_related.php';">
                <a class="nav-item" style="color: #6F6F6F;">
                    <i class="fa uil-user"></i>
                    Account related Details</a>
            </div>
            <div class="item" onclick="window.location.href='';">
                <a class="nav-item" style="color: #6F6F6F;">
                    <i class="fa uil-question-circle"></i>
                    Study related querys</a>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("contextmenu", e => e.preventDefault());
        const contextMenu = document.getElementById("context-menu");
        const scope = document.querySelector("body");

        const normalizePozition = (mouseX, mouseY) => {
            // ? compute what is the mouse position relative to the container element (scope)
            let {
                left: scopeOffsetX,
                top: scopeOffsetY,
            } = scope.getBoundingClientRect();

            scopeOffsetX = scopeOffsetX < 0 ? 0 : scopeOffsetX;
            scopeOffsetY = scopeOffsetY < 0 ? 0 : scopeOffsetY;

            const scopeX = mouseX - scopeOffsetX;
            const scopeY = mouseY - scopeOffsetY;

            // ? check if the element will go out of bounds
            const outOfBoundsOnX =
                scopeX + contextMenu.clientWidth > scope.clientWidth;

            const outOfBoundsOnY =
                scopeY + contextMenu.clientHeight > scope.clientHeight;

            let normalizedX = mouseX;
            let normalizedY = mouseY;

            // ? normalize on X
            if (outOfBoundsOnX) {
                normalizedX =
                    scopeOffsetX + scope.clientWidth - contextMenu.clientWidth;
            }

            // ? normalize on Y
            if (outOfBoundsOnY) {
                normalizedY =
                    scopeOffsetY + scope.clientHeight - contextMenu.clientHeight;
            }

            return {
                normalizedX,
                normalizedY
            };
        };

        scope.addEventListener("contextmenu", (event) => {
            event.preventDefault();

            const {
                clientX: mouseX,
                clientY: mouseY
            } = event;

            const {
                normalizedX,
                normalizedY
            } = normalizePozition(mouseX, mouseY);

            contextMenu.classList.remove("visible");

            contextMenu.style.top = `${normalizedY}px`;
            contextMenu.style.left = `${normalizedX}px`;

            setTimeout(() => {
                contextMenu.classList.add("visible");
            });
        });

        scope.addEventListener("click", (e) => {
            // ? close the menu if the user clicks outside of it
            if (e.target.offsetParent != contextMenu) {
                contextMenu.classList.remove("visible");
            }
        });
    </script>
</body>

</html>
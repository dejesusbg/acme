<footer>
    <span>© 2024</span>

    <?php if (!$is_logged): ?>
        <a href="./auth"> Admin </a>
    <?php elseif ($_SESSION["ROL_LOGIN"] == "Admin"): ?>
        <a href="./admin"> Admin </a>
    <?php endif; ?>

    <a href="./contact"> Made by </a>
    <span id="time"></span>
</footer>

<script>
    var time = document.getElementById("time");

    if (time) {
        function requestDate() {
            let date, local = new Date();

            const url = "https://cors-anywhere.herokuapp.com/https://www.timeapi.io/api/Time/current/zone?timeZone=America/Bogota",
                options = {};

            // try {
            //     fetch(url, options)
            //         .then((res) => { })
            //         .then((obj) => {
            //             if (obj == null) {
            //                 console.log("Date request was not fetched.")
            //             } else {
            //                 console.log("Date request was succesfully fetched.")
            //                 date = obj.time;
            //             }
            //         });
            // } catch (err) { }

            localDate = {
                hour: ("0" + local.getHours()).slice(-2),
                min: ("0" + local.getMinutes()).slice(-2),
            };

            date ??= localDate.hour + ":" + localDate.min;
            return date;
        }

        function updateTime() {
            setTimeout(() => {
                time.innerHTML = requestDate();
            }, 1000);
        }

        setInterval(updateTime, 60000);
        updateTime();
    }

</script>
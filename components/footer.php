    <footer class="text-center" id="footer">
        <h5>FishTech</h5>
        <p>&copy; 2021</p>
    </footer>

    <script src="assets/js/jquery-3.3.1.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $.each($('#navbar').find('li'), function() {
            $(this).toggleClass('active', 
            window.location.pathname.indexOf($(this).find('a').attr('href')) > -1);
    }); 
});
    </script>
</body>

</html>
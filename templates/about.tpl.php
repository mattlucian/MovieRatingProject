

        <aside id="side-nav" class="span3">

        </aside>

        <div class="span9 content-container">
                <div id="content-window" class="content">
				<h3>What is AccuRate</h3>
				<p class="a-desc"><span class='tab'>&nbsp;</span> This website is a group project for our internet programming class that was taken in the summer of 2014. We had to come up with an idea to utilize all that we learned in the course. So as a group we decided to create a movie rating site, where a user can create an account and rate movies.
				</p>
                <section>
                        <h3>Team Members</h3>
                        <section class="grp-member">
                                <a href='http://cop4813.ccec.unf.edu/~n00617897/cop4813/assign1/index.html' alt='Randy Blankenship'>
                                        Randy Blankenship</a>
                        </section>
                        <section class="grp-member">
                                <a href='http://cop4813.ccec.unf.edu/~n00175519/cop4813/assign1/index.html' alt='Kristyn Galane'>
                                        Kristyn Galane</a>
                        </section>
                        <section class="grp-member">
                                <a href='http://cop4813.ccec.unf.edu/~n00774975/cop4813/assign1/index.html' alt='Doaa Gamal'>
                                        Doaa Gamal</a>
                        </section>
                        <section class="grp-member">
                                <a href='http://cop4813.ccec.unf.edu/~n00748663/assign1/index.html' alt='Matthew Myers'>
                                        Matthew Myers</a>
                        </section>
                        <section class="grp-member">
                                <a href='http://cop4813.ccec.unf.edu/~n00680870/cop4819/assign1/index.html' alt='Karthik Sundaresan'>
                                        Karthik Sundaresan</a>
                        </section>
                </section>
                </div>

            <hr>
            <form action="login.php" method="post">
                Username:<br />
                <input type="text" name="username" value="" />
                <br /><br />
                Password:<br />
                <input type="password" name="password" value="" />
                <br /><br />
                <input class="bigButton" type="submit" value="Login" />
            </form>
            <p style="color:red;"><?php print @$this->error ?></p>
            <a href="register.php">Register</a>

        </div> <!-- end .content-container -->
 <footer class="row" style="margin:0;" id='footer'>
            <p>Copyright &copy; 2014 | IP Group 2</p>
        </footer>
</body>
</html>

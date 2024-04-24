  <header>
            <div class="icon" onclick="shownavbar()">
                <i class="fa-solid fa-bars" id="list"></i>
                <i class="fa-solid fa-xmark" id="cross"></i>

            </div>
            <div class="nav-logo" onclick="nav_logo()">
                <h3 >library Management System</h3>
            </div>
            <div class="user-search-book">
                <div class="searchbar searchfield">
                    <input type="text" id="navbarbooksearch" name="" placeholder="Searh books" onkeyup="navsearchbooks(event)">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <!-- <div class="user-search-filter searchfield">
                    <select name="" id="">
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                        <option value="">Book name</option>
                    </select>
                </div>
                <div class="user-search-filter searchfield">
                    <select name="" id="">
                        <option value="">story</option>
                        <option value="">story</option>
                        <option value="">story</option>
                        <option value="">story</option>
                        <option value="">story</option>
                    </select>
                </div> -->
            </div>
            <div class="login-user">
                <i class="fa-regular fa-user"></i>
                <span id="user-name"></span>
            </div>
            <div class="loginbtn">
                <div class="btn" id="login">
                    <button onclick="show_login()">login</button>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </div>
                <div class="btn" id="logout">
                    <button onclick="logout()">logout</button>
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </div>
            </div>


        </header>
        <aside>
                <div class="menu">
                    <i class="fa-solid fa-house"></i>
                    <a href="../userdashboard/userdashboard.php">Home</a>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-bookmark"></i>
                    <span>BOOKMARKS</span>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-book"></i>
                    <a href="../userissuebook/userissuebook.php">Issued Books</a>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-book"></i>
                    <span>ALL BOOKS</span>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <a href="../usersearchbook/usersearchbook.php">SEARCH BOOKS</a>
                </div>
            </aside>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        /* background-color: rgb(201, 228, 248); */
        /* background: linear-gradient(239deg,#6b6bd066,#f9979787,#e9e9706b); */
        font-family: Poppins;
    }

    #admin-header {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin: 5px 0px 15px 0px;
        /* background: skyblue; */


    }

    .logo {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        position: relative;
        margin: 10px;
    }

    /* .logo img{
    height: 7vh;
    width: 7vw;
    margin: 5px;
} */
    .logo {
        font-family: Bungee Spice;
        font-size: 30px;
    }

    .loginbtn {
        position: absolute;
        right: 30px;

    }

    .loginbtn button {
        width: 100px;
    padding: 6px 14px 5px 0px;
    border-radius: 14px;
    font-size: 14px;
    font-weight: bold;
    font-family: Poppins;
    }
    .loginbtn i{
        font-size: 18px;
    position: absolute;
    right: 8px;
    top: 9px;

    }

    .loginbtn button:hover {
        background-color: rgb(37, 37, 246);
        color: white;
        cursor: pointer;
    }

    /* Navbar */
    #admin-nav {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        background-color: #9fc0c0;
        padding: 5px 0px;
        border-bottom: 4px solid black;
        width: 100%;
    }

    .nav-items {
        /* border: 2px solid black; */
        margin: 0px 20px 5px 0px;
        font-size: 17px;
        font-weight: bold;
        width: 137px;
        padding: 5px 10px;
        text-align: center;

    }

    .nav-items a {
        text-decoration: none;
        color: #1d166b;
    }

    .nav-items a:hover {
        color: rgb(20, 20, 36);
        cursor: pointer;

    }
</style>
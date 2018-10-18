<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial;
        background: url('/img/foosball.jpg');
    }
    .nav ul{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        list-style-type: none;
        padding: 0 400px 0 400px;
        background: rgba(0,0,0,0.3);
    }
    .nav ul li {

    }
    .nav ul li a{
        text-decoration: none;
        font-size: 16px;
        display: block;
        padding: 15px;
        text-align: center;
        border-bottom: 2px solid rgba(0,0,0,0);
        color: #fff;
    }

    .nav ul li a:hover {
        border-bottom: 2px solid #fff;
        background: rgba(0,0,0,0.3);
    }
    .playertable {
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
        background: rgba(19, 50, 34, 0.8);
        width: 50%;
        padding: 25px;
        color: #fff;
        box-shadow: 0px 0px 15px #000;
    }
    .playertable table {
        border-spacing: 0px;
    }
    .playertable td, th{
        padding: 15px;
        color: #fff;
        text-align: left;
    }
    .matchestable {
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        background: rgba(19, 50, 34, 0.8);
        padding: 25px;
        color: #fff;
        width: 50%;
        box-shadow: 0px 0px 15px #000;

    }
    .matchestable .table_wrapper {
        overflow-y: scroll;
        height: 290px;
    }
    .matchestable td, th {
        padding: 5px 10px;
        color: #fff;
        text-align: left;
    }
    .content {
        width: 100%;
    }
    .content table {
        margin: 20px 0px 20px 0px;
    }

    .form_wrapper {
        margin-top: 50px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        padding: 25px;
        background: rgba(19, 50, 34, 0.8);
        color: #fff;
    }
    .form_wrapper form {
        margin-left: auto;
        margin-right: auto;
        width: fit-content;
    }
    .form_wrapper button {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background: #001E5B;
        color: #fff;
        font-weight: bold;
        border: 0px solid #fff;
    }
    .set {
        width: fit-content;
        margin-right: auto;
        margin-left: auto;
    }
    .setheader {
        text-align: center;
    }
    .set input {
        height: 100px;
        width: 100px;
        font-size: 85px;
        text-align: center;
        background: rgba(255,255,255,0.3);
        border: 0px solid #fff;
        color: #fff;
    }
    .font-85 {
        font-size: 85px;
        padding: 0px 10px 0px 20px;
    }

    .form_wrapper{
        font-size: 30px;
    }
    .form_wrapper select{
        font-size: 30px;
        background: rgb(19, 50, 34);
        color: #fff;
        border: 0px solid #000;
        padding: 0px 5px 0px 5px;
    }
    .matchestable .colorred {
        color: red;
        font-weight: bold;
    }
    .matchestable .coloryellow {
        color: yellow;
        font-weight: bold;
    }

</style>

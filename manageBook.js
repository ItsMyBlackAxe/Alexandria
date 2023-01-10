function validateInsert() {
        let isbnI = document.forms["addBook"]["txt_i_ISBN"].value;
        let titleA = document.forms["addBook"]["txt_i_title"].value;
        let authorA = document.forms["addBook"]["txt_i_author"].value;
        let categoryA = document.forms["addBook"]["txt_i_category"].value;
        let arrivaldateA = document.forms["addBook"]["txt_i_arrivalDate"].value;

        if ((isbnI == "") && (titleA == "") && (authorA == "") && (categoryA == "") && (arrivaldateA == "")) {
                alert("Please enter details to insert book.");
                return false;
        }
        else if ((titleA == "") && (authorA == "") && (categoryA == "") && (arrivaldateA == "")) {
                alert("Please insert title,author,category and arrival date.");
                return false;
        }
        else if ((authorA == "") && (categoryA == "") && (arrivaldateA == "")) {
                alert("Please insert author,category and arrival date.");
                return false;
        }
        else if ((categoryA == "") && (arrivaldateA == "")) {
                alert("Please insert category and arrival date.");
                return false;
        }
        else if (isbnI == "") {
                alert("Please insert ISBN.");
                return false;
        }
        else if (titleA == "") {
                alert("Please insert title.");
                return false;
        }
        else if (authorA == "") {
                alert("Please insert author.");
                return false;
        }
        else if (categoryA == "") {
                alert("Please insert category.");
                return false;
        }
        else if (arrivaldateA == "") {
                alert("Please insert arrival date.");
                return false;
        }

}

function validateUpdate()
{
        let isbnu = document.forms["updateBook"]["txt_u_search"].value;
        let titleu = document.forms["updateBook"]["txt_u_title"].value;
        let authoru = document.forms["updateBook"]["txt_u_author"].value;
        let categoryu = document.forms["updateBook"]["txt_u_category"].value;
        let arrivaldateu = document.forms["updateBook"]["txt_u_arrivalDate"].value;

        if ((isbnu == "") && (titleu == "") && (authoru == "") && (categoryu == "") && (arrivaldateu == "")) {
                alert("Please enter details to update book.");
                return false;
        }
        else if ((titleu == "") && (authoru == "") && (categoryu == "") && (arrivaldateu == "")) {
                alert("Please insert title,author,category and arrival date.");
                return false;
        }
        else if ((authoru == "") && (categoryu == "") && (arrivaldateu == "")) {
                alert("Please insert author,category and arrival date.");
                return false;
        }
        else if ((categoryu == "") && (arrivaldateu == "")) {
                alert("Please insert category and arrival date.");
                return false;
        }
        else if (isbnu == "") {
                alert("Please insert ISBN.");
                return false;
        }
        else if (titleu == "") {
                alert("Please insert title.");
                return false;
        }
        else if (authoru == "") {
                alert("Please insert author.");
                return false;
        }
        else if (categoryu == "") {
                alert("Please insert category.");
                return false;
        }
        else if (arrivaldateu == "") {
                alert("Please insert arrival date.");
                return false;
        }
}

function validateDelete()
{
        let isbnd = document.forms["deleteBook"]["txt_d_isbn"].value;
        if (isbnd == "") {
                alert("Please insert ISBN to delete record.");
                return false;
        }
}
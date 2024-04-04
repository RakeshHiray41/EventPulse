<?php
include '_dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['createCafe'])) {
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $address = $_POST["address"];
        $map = $_POST["map"];
        $rating  = $_POST["rating"];

        // $sql = "INSERT INTO categories (\"categorieName\", \"categorieDesc\") VALUES ('$name', '$desc')";
        $sql = "INSERT INTO public.caffe_list(\"caffe_name\", \"address\", \"rating\", \"description\", \"map\")
            VALUES ('$name', '$address', '$rating', '$desc', '$map');";

        $result = pg_query($conn, $sql);

        $sql = "SELECT * FROM public.caffe_list ORDER BY \"caffe_id\" DESC LIMIT 1";
        $result = pg_query($conn, $sql);
        $row = pg_fetch_assoc($result);
        $catId = $row["caffe_id"];
        if ($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {

                $newfilename = "cafe-" . $catId . ".jpg";

                $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
                $uploadfile = $uploaddir . $newfilename;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed to upload image');
                            window.location=document.referrer;
                        </script>";
                }
            } else {
                echo '<script>alert("Please select an image file to upload.");
                    </script>';
            }
        }
    }
    if (isset($_POST['removeCategory'])) {
        $catId = $_POST["catId"];
        $filename = $_SERVER['DOCUMENT_ROOT'] . "/img/cafe-" . $catId . ".jpg";
        $sql = "DELETE FROM caffe_list WHERE \"caffe_id\"='$catId'";
        $result = pg_query($conn, $sql);

        if ($result) {
            if (file_exists($filename)) {
                unlink($filename);
            }
            echo "<script>alert('Removed');
                window.location=document.referrer;
                </script>";
        } else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
    if (isset($_POST['updateCategory'])) {
        $catId = $_POST["catId"];
        $catName = $_POST["name"];
        $catDesc = $_POST["desc"];
        $map = $_POST["map"];
        $address = $_POST["address"];
// caffe_id, caffe_name, address, rating, description, map
        $sql = "UPDATE caffe_list SET \"caffe_name\"='$catName', \"description\"='$catDesc',\"map\"='$map',\"address\"='$address' WHERE \"caffe_id\"='$catId'";
        $result = pg_query($conn, $sql);

        if ($result) {
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        } else {
            // echo "<script>alert('failed');
            //     window.location=document.referrer;
            //     </script>";
        }
    }
    if (isset($_POST['updateCatPhoto'])) {
        $catId = $_POST["catId"];
        $check = getimagesize($_FILES["catimage"]["tmp_name"]);
        if ($check !== false) {
            $newName = 'cafe-' . $catId;
            $newfilename = $newName . ".jpg";

            $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/img/';
            $uploadfile = $uploaddir . $newfilename;

            if (move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadfile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        } else {
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}

<?php
include("./include/connection.php");
?>
<?php
require("./fpdf.php");

function generateInvoiceNumber()
{
    // Define a prefix for your invoice number (optional)
    $prefix = 'INV';

    // Generate a random number between 100000 and 999999 (adjust as needed)
    $randomNumber = mt_rand(1000, 9999);

    // Get the current timestamp (or use any other timestamp you prefer)
    $timestamp = time();

    // Combine the prefix, random number, and timestamp
    $invoiceNumber = $prefix . $randomNumber . $timestamp;

    return $invoiceNumber;
}

function getCurrentDate()
{
    // Set the time zone to your desired time zone
    date_default_timezone_set('Asia/Kolkata');

    // Get the current date in the format 'Y-m-d' (Year-Month-Day)
    $currentDate = date('Y-m-d');

    return $currentDate;
}

// Example usage
$today = getCurrentDate();


// Example usage
$invoiceNumber = generateInvoiceNumber();


// write code to fetch customer details from database 
$status = 1;
$query = "SELECT * FROM tbl_user WHERE role = 0 ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$fname = $row['firstname'];
$lname = $row['lastname'];





//customer and invoice details
$info = [
    "customer" => "$fname $lname",
    "address" => "4th cross,Car Street,",
    "city" => "Salem 636204.",
    "invoice_no" => "$invoiceNumber",
    "invoice_date" => "$today",
    "total_amt" => "5200.00",
    "words" => "Rupees Five Thousand Two Hundred Only",
];


//invoice Products
$products_info = [
    [
        "name" => "Keyboard",
        "price" => "500.00",
        "qty" => 2,
        "total" => "1000.00"
    ],
    [
        "name" => "Mouse",
        "price" => "400.00",
        "qty" => 3,
        "total" => "1200.00"
    ],
    [
        "name" => "UPS",
        "price" => "3000.00",
        "qty" => 1,
        "total" => "3000.00"
    ],
];

class PDF extends FPDF
{
    function Header()
    {
        //Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "ALAZEA NURSERY", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "203-Affil Complex", 0, 1);
        $this->Cell(50, 7, "Surat 395006.", 0, 1);
        $this->Cell(50, 7, "PH  +91 78610 25980", 0, 1);

        //Display INVOICE text
        $this->SetY(15);
        $this->SetX(-100);
        $this->SetFont('Arial', 'B', 24);
        $this->Cell(50, 20, "CUSTOMER  INVOICE", 0, 1);

        //Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }
    function body($info, $products_info)
    {
        //Billing Details
        $this->SetY(55);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, "Bill To: ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 7, $info["customer"], 0, 1);
        $this->Cell(50, 7, $info["address"], 0, 1);
        $this->Cell(50, 7, $info["city"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-80);
        $this->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-80);
        $this->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(80, 9, "DESCRIPTION", 1, 0);
        $this->Cell(40, 9, "PRICE", 1, 0, "C");
        $this->Cell(30, 9, "QTY", 1, 0, "C");
        $this->Cell(40, 9, "TOTAL", 1, 1, "C");
        $this->SetFont('Arial', '', 12);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(80, 9, $row["name"], "LR", 0);
            $this->Cell(40, 9, $row["price"], "R", 0, "R");
            $this->Cell(30, 9, $row["qty"], "R", 0, "C");
            $this->Cell(40, 9, $row["total"], "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->Cell(80, 9, "", "LR", 0);
            $this->Cell(40, 9, "", "R", 0, "R");
            $this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 1, "R");
        }
        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(150, 9, "TOTAL", 1, 0, "R");
        $this->Cell(40, 9, $info["total_amt"], 1, 1, "R");

        //Display amount in words
        $this->SetY(225);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 9, "Amount in Words ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 9, $info["words"], 0, 1);
    }
    function Footer()
    {
        //set footer position
        $this->SetY(-50);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "for ALAZEA NURSERY", 0, 1, "R");
        $this->Ln(15);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, "Authorized Signature", 0, 1, "R");
        $this->SetFont('Arial', '', 10);

        //Display Footer Text
        $this->Cell(0, 10, "Invoice Generated By ALAZEA Nursery..", 0, 1, "C");
    }
}
//Create A4 Page with Portrait 
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info);
ob_end_clean();
$pdf->Output();

?>
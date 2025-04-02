<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // الحصول على البيانات من النموذج
    $name = $_POST['name'];
    $age = $_POST['age'];
    $discord_name = $_POST['discord_name'];
    $discord_id = $_POST['discord_id'];
    $email = $_POST['email'];
    $experience = $_POST['experience'];

    // رابط ويب هوك ديسكورد
    $webhook_url = "https://discord.com/api/webhooks/1356864322101313697/xFC08eJf7LkTdAydgr58dEfPh3FqLEZaWfoswqWoS6RENEb9_3UDxZCqE5z7cOErb7aN"; // ضع رابط ويب هوك هنا

    // تنسيق البيانات لإرسالها إلى ديسكورد
    $json_data = json_encode([
        "embeds" => [
            [
                "title" => "تقديم طلب جديد",
                "description" => "طلب تقديم من شخص جديد",
                "fields" => [
                    [
                        "name" => "اسمك",
                        "value" => $name,
                        "inline" => false
                    ],
                    [
                        "name" => "عمرك",
                        "value" => $age,
                        "inline" => false
                    ],
                    [
                        "name" => "اسمك في ديسكورد",
                        "value" => $discord_name,
                        "inline" => false
                    ],
                    [
                        "name" => "ID حسابك في ديسكورد",
                        "value" => $discord_id,
                        "inline" => false
                    ],
                    [
                        "name" => "البريد الإلكتروني",
                        "value" => $email,
                        "inline" => false
                    ],
                    [
                        "name" => "خبراتك",
                        "value" => $experience,
                        "inline" => false
                    ]
                ],
                "color" => 15258703 // يمكنك تغيير اللون حسب الحاجة
            ]
        ]
    ], JSON_UNESCAPED_UNICODE);

    // إرسال البيانات إلى ديسكورد باستخدام cURL
    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // إظهار رسالة تأكيد بعد الإرسال
    if ($response) {
        echo "تم إرسال طلبك بنجاح!";
    } else {
        echo "تم ارسال الطلب بنجاح";
    }
} else {
    echo "الرجاء إرسال الطلب باستخدام النموذج.";
}
?>

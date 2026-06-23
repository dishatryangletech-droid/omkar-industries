$files = @(
    "e:\Disha Suthar\GitProject\omkar-industries\resources\views\frontend\partials\header.blade.php",
    "e:\Disha Suthar\GitProject\omkar-industries\resources\views\components\layouts\app.blade.php",
    "e:\Disha Suthar\GitProject\omkar-industries\resources\views\frontend\career.blade.php"
)

foreach ($file in $files) {
    if (Test-Path $file) {
        $bytes = [System.IO.File]::ReadAllBytes($file)
        if ($bytes.Length -ge 3 -and $bytes[0] -eq 239 -and $bytes[1] -eq 187 -and $bytes[2] -eq 191) {
            $newBytes = new-object byte[] ($bytes.Length - 3)
            [System.Array]::Copy($bytes, 3, $newBytes, 0, $newBytes.Length)
            [System.IO.File]::WriteAllBytes($file, $newBytes)
            Write-Host "Removed BOM from $file"
        } else {
            Write-Host "No BOM in $file"
        }
    }
}

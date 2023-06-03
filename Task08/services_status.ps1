Get-Service | ForEach-Object {
    If ( $_.status -Eq "Running" ) {
        Write-Host $_.status $_.name -Foregroundcolor green
    } Else {
        Write-Host $_.status $_.name -Foregroundcolor red
    }
}
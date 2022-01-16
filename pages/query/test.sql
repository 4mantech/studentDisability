SELECT
    idCardNumber
FROM
    users
WHERE
    id != '$id' AND
    idCardNumber = '$disaCardId'
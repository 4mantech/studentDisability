SELECT
    u.id,
    u.firstName,
    u.lastName,
    d.documentPath,
    d.documentName,
    d.documentType
FROM
    documents d
    INNER JOIN users u
    ON u.id = d.userId
WHERE
    userId = '$id'
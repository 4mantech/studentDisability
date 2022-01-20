UPDATE `users` 
    SET `firstName`='$name',
    `lastName`='$lastname',
    `phone`='$telNum',
    `idCardNumber`='$disaCardId',
    `idCodeAcdemy`='$StuId',
    `birthDate`='$birthday',
    `age`='$age',
    `nickName`='$nickname' WHERE `id` = $ID


select `main_blog_category`.*, `main_blog_category_relation`.`buuid`
from `main_blog_category`
inner join `main_blog_category_relation`
  on `main_blog_category_relation`.`uuid` = `main_blog_category`.`cuuid`
where `main_blog_category_relation`.`buuid` = 57B3835C2E2A06A83697A7164E731593)


explain SELECT b.uuid,b.title,r.cuuid cateid,a.username author FROM main.main_blog as b
    LEFT JOIN manage.manage_admin as a ON a.uuid = b.createdby
    LEFT JOIN main.main_blog_category_relation as r ON r.buuid = b.uuid
    WHERE r.cuuid in ('sdvds')\G;


explain SELECT b.uuid,b.title,r.cuuid cateid,a.username author FROM main.main_blog as b LEFT JOIN manage.manage_admin as a ON a.uuid = b.createdby LEFT JOIN main.main_blog_category_relation as r ON r.buuid = b.uuid WHERE r.cuuid in ('sdvds')\G;
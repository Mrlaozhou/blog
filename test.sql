


explain SELECT b.uuid,b.title,r.cuuid cateid,a.username author FROM main.main_blog as b
    LEFT JOIN manage.manage_admin as a ON a.uuid = b.createdby
    LEFT JOIN main.main_blog_category_relation as r ON r.buuid = b.uuid
    WHERE r.cuuid in ('sdvds')\G;









explain SELECT b.uuid,b.title,r.cuuid cateid,a.username author FROM main.main_blog as b LEFT JOIN manage.manage_admin as a ON a.uuid = b.createdby LEFT JOIN main.main_blog_category_relation as r ON r.buuid = b.uuid WHERE r.cuuid in ('sdvds')\G;
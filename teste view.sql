SELECT 
ca.*, 
cam.referencia camara, 
ga.numero gaveta, 
us.usuario, 
pro.local, 
grau.descricao parentesco 
FROM cadaver ca 
INNER JOIN camara cam ON cam.idcamara=ca._id_camara 
INNER JOIN gaveta ga ON ga.idgaveta=ca.id_gaveta_ 
INNER JOIN usuario us ON us.idusuario=ca.id_usuario_ 
INNER JOIN proveniencia pro ON pro.idproveniencia=ca.id_proveniencia_ 
INNER JOIN grau_parentestico grau ON grau.idgrau_parentestico=ca.id_grau_parentesco 
WHERE ca.statu='Depositado'


CREATE view view_cadaver AS
SELECT 
ca.*, 
cam.referencia camara, 
ga.numero gaveta, 
us.usuario, 
pro.local local_proveniencia , 
grau.descricao grau_parentesco 
FROM cadaver ca 
INNER JOIN camara cam ON cam.idcamara=ca._id_camara 
INNER JOIN gaveta ga ON ga.idgaveta=ca.id_gaveta_ 
INNER JOIN usuario us ON us.idusuario=ca.id_usuario_ 
INNER JOIN proveniencia pro ON pro.idproveniencia=ca.id_proveniencia_ 
INNER JOIN grau_parentestico grau ON grau.idgrau_parentestico=ca.id_grau_parentesco 
WHERE ca.statu='Depositado'


create view view_autopsia as
SELECT 
gp.descricao parentesco,
c.*,
sl.descricao sala,
us.usuario,
pro.local,
cm.referencia camara,
gv.numero n_gaveta,
aut.obs,
aut.data,
aut.idautopsia,
sl.idsala_autopsia
FROM autopsia aut 

INNER JOIN cadaver c 
ON c.id_cadaver=aut.id_cadaver
INNER JOIN sala_autopsia sl 
ON aut.id_sala_autopsia=sl.idsala_autopsia
INNER JOIN grau_parentestico gp 
ON c.id_grau_parentesco=gp.idgrau_parentestico
INNER JOIN camara cm 
ON c._id_camara=cm.idcamara
INNER JOIN gaveta gv
ON c.id_gaveta_=gv.idgaveta
INNER JOIN usuario us
ON c.id_usuario_=us.idusuario
INNER JOIN proveniencia pro
ON c.id_proveniencia_=pro.idproveniencia
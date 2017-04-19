<?php

/*

     *----------------------------------------------*

     | Config.php                                   |

     | File di Connessione al DB Mysql delle pesate |

     |                                              |

     | Davide Brutto 14-08-09 Ver.:1.0              |

     *----------------------------------------------*

     */

     define('DB_HOST_1','172.16.10.17');

     define('DB_USER_1', 'sa');

     define('DB_PASSWORD_1','idempalu');

     define('DB_DATABASE_1','NewProducts');

     define('DB_TABLE_1','dbo.Scheda_Proposta_Articolo');
     
     define('DB_HOST_2','172.16.10.116\SQLEXPRESS');

     define('DB_USER_2', 'ts90');

     define('DB_PASSWORD_2','ts90');

     define('DB_DATABASE_Etichette','PALUANI_Etichette');

     define('DB_TABLE_Stampanti','dbo.Stampanti');
     define('DB_TABLE_Stampate','dbo.Stampate');
     
	  define('DB_DATABASE_Articoli','PALUANI_TS90');     
     define('DB_TABLE_Articoli','dbo.AnagraficaArticolo');

/*

     *----------------------------------------------*

     |                                              |

     | Per utilizzare la connessione chiamare:      |

     |                                              |

     | include 'Config_Conn.php';              |

     *----------------------------------------------*

     */

?>




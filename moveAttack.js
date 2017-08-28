function moveAttack (x,y) {
	var arrived = false;
	while(arrived){
		var heroX = hero.pos.x;
		var heroY = hero.pos.y;
		if (heroX > x) {
			heroX--;
		}
		if (heroX < x) {
			heroX++;
		}
		if (heroY > y) {
			heroY--;
		}
		if (heroY < y) {
			heroY++;
		}

		var e = hero.findEnemies();  
		for(var i = 0; i<e.length; i++) {
    		if (hero.distanceTo(e[i]) < 25)
        	attackSmart(e[i]);
    	} 

    	hero.moveXY(heroX, heroY);
    	if (heroX===x && heroY===y) {
    		arrived = true;
    	}
	}
}
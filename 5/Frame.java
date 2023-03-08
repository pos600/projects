import java.awt.*;
import java.awt.event.*;
import java.util.*;
import javax.swing.*;

public class Frame extends JFrame{
	
	Panel panel;
	
	Frame(){
		
		panel = new Panel();
		this.add(panel);
		this.setTitle("Ping Pong");
		this.setResizable(false);
		this.setBackground(Color.black);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE); //enables close on "X" click
		this.pack(); //automatic resizing of panel
		this.setVisible(true);
		this.setLocationRelativeTo(null); //sets panel to middle on run
		
	}

}

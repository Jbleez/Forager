import java.io.*;
import java.net.*;
 
public class RunClass {


private Process theProcess;

public RunClass(){
}
	
 
    public void run()
	
	{
                  try { 
                            Runtime r = Runtime.getRuntime(); 
                            Process p = r.exec("cmd /c start java -jar C:\\wamp\\www\\spsuForager3-master\\dist\\spsuForager3.jar");
							theProcess = p;
                          
                         }
                            catch(Exception e) 
                        { 
                            System.out.println("erreur d'execution " + "cmd /c start C:\\wamp\\www\\spsuForager3-master\\dist\\spsuForager3.jar"+ e.toString()); 
                        }
                
     } 

		public Process getProcess()
		{
			return theProcess;
		}
	   
  
 
    }
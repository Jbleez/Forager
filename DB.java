/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ForagerP;

/**
 *
 * @author Chaos
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import java.util.Set;
import java.util.logging.Level;
import java.util.logging.Logger;
 
 
public class DB {
 
	public Connection conn;
 
	public DB(String host){
            try {
                //System.out.println("com.mysql.jdbc.Driver");
                //try {
                
                Class.forName("com.mysql.jdbc.Driver");
                
                //String url = "jdbc:mysql://localhost:3306/forager";
                String url = "jdbc:mysql://"+host+":3306/forager";
                
                conn = DriverManager.getConnection(url, "root", "couchsql");
                System.out.println("conn built");
                
                //}
                //}
            } catch (SQLException ex) {
                Logger.getLogger(DB.class.getName()).log(Level.SEVERE, null, ex);
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(DB.class.getName()).log(Level.SEVERE, null, ex);
            }
	}
 
//	public Connection getCon(){
//            return conn;
//        }
        
        //Bo
        public void clearRecord() throws SQLException{
            clear();
        }
        
        public void clear() throws SQLException{
            this.runSql2("TRUNCATE Record;");
        }
        
        //insert the url given into the database, if no errors given, assumes none
        public void insert(String input){
            insert(input,0,-1);
        }
        
        //Bo
        public void saveRecord(SqlPage record) {
            insert(record.url,record.getStatus(),record.getErrors());
        }
        
        //Bo
        public void saveRecords(Set<SqlPage> records){
            for(SqlPage record:records){
                saveRecord(record);
            }
        }
        
        public void insert(String input, int status, int errors){
            try {
                String sql = "INSERT INTO  `forager`.`Record` " + "(`URL`,`status`,`errorCount`) VALUES " + "(?,?,?);";
                PreparedStatement stmt = this.conn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
                stmt.setString(1, input);
                stmt.setInt(2, status);
                stmt.setInt(3, errors);
                stmt.execute();
            } catch (SQLException ex) {
                Logger.getLogger(DB.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        
        
        //gets the entire table from SQL and returns a List<SqlPage>
        public List<SqlPage> toList() throws SQLException{
            String sql = "select * from Record";
            Statement sta = conn.createStatement();
            ResultSet rs = sta.executeQuery(sql);
            
            List <SqlPage> temp = new ArrayList<>();
            
            while (rs.next()){
                int k = rs.getInt("RecordID");
                String url = rs.getString("URL");
                int e = rs.getInt("errorCount");
                SqlPage newUrl = new SqlPage(k,url,e);
                temp.add(newUrl);
            }
            
            return temp;
        }
        
        //tests that the toList() method returns valid content and outputs to System.out
        public void toListTest() throws SQLException{
            List <SqlPage> dbList = new ArrayList<>();
            dbList = this.toList();
            for(int i=0;i<dbList.size();i++){
            System.out.println(dbList.get(i));
            }
        }
        
        public ResultSet selectRs(String input) throws SQLException{
            String sql = "select * from Record where URL = '"+input+"'";
            Statement sta = conn.createStatement();
            //ResultSet rs=null;
            //rs = this.runSql(sql);
            return sta.executeQuery(sql);
        }
        
        public ResultSet runSql(String sql) throws SQLException {
		Statement sta = conn.createStatement();
		return sta.executeQuery(sql);
	}
 
	public boolean runSql2(String sql) throws SQLException {
		Statement sta = conn.createStatement();
		return sta.execute(sql);
	}
        
        @Override
	protected void finalize() throws Throwable {
            try {
                if (conn != null || !conn.isClosed()) {
                    conn.close();
                }
            } finally {
                super.finalize();
            }
	}
}
package example;

import org.junit.Test;

public class RemoteTest {

	@Test
	public void test() {
	Remote remote= new Remote();
	Tv tv = new Tv();
	
	remote.setCommands(0, new TvIsOn(tv), new TvIsOff(tv));
	
	remote.onCommandPushed(0);
	remote.offCommandPushed(0);
	}
}